<?php

namespace App\Http\Controllers;

use App\Models\LegalSearch;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LegalSearchController extends Controller
{
    /**
     * Display the legal search form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('legal-search.index');
    }

    /**
     * Search by file number.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $request->validate([
            'file_number' => 'required|string|max:255',
        ]);

        // Query the database for the file number
        $results = LegalSearch::where('file_number', $request->file_number)->get();

        // Check if any records were found
        if ($results->isEmpty()) {
            return back()->with('error', 'No records found for the provided file number.')->withInput();
        }

        // Redirect to the payment page with the file number
        return redirect()->route('legal-search.payment')->with('file_number', $request->file_number);
    }

    /**
     * Display the payment page.
     *
     * @return \Illuminate\View\View
     */
    public function payment(Request $request)
    {
        return view('legal-search.payment');
    }

    /**
     * Process payment for legal search.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_reference' => 'required|string',
            'file_number' => 'required|string|max:255',
        ]);

        // Create a payment record
        $payment = Payment::create([
            'reference' => $request->payment_reference,
            'amount' => 10000, // Assuming the amount is ₦10,000
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        // Initiate Paystack payment
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('paystack.secret_key'),
        ])->post('https://api.paystack.co/transaction/initialize', [
            'amount' => 10000 * 100, // Amount in kobo
            'email' => Auth::user()->email,
            'callback_url' => route('legal-search.callback', $payment->id),
        ]);

        $responseBody = $response->json();

        if ($response->successful()) {
            return redirect($responseBody['data']['authorization_url']);
        }

        return back()->with('error', 'Payment initiation failed.')->withInput();
    }

    /**
     * Handle Paystack payment callback.
     *
     * @param  int  $paymentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        // Verify the payment
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('paystack.secret_key'),
        ])->get("https://api.paystack.co/transaction/verify/{$payment->reference}");

        $responseBody = $response->json();

        if ($response->successful() && $responseBody['data']['status'] === 'success') {
            // Update payment status
            $payment->status = 'completed';
            $payment->save();

            // Find the legal search record
            $legalSearch = LegalSearch::where('file_number', $payment->file_number)->first();

            if ($legalSearch) {
                // Update legal search record with payment details
                $legalSearch->service_code = 'SC-' . time();
                $legalSearch->payment_id = $payment->id;
                $legalSearch->status = 'completed';
                $legalSearch->save();
            }

            return redirect()->route('legal-search.results')->with('success', 'Payment successful. Your search report is ready.');
        }

        return back()->with('error', 'Payment verification failed.');
    }

    /**
     * Display the search report.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function report($id)
    {
        // Fetch the main result
        $result = LegalSearch::findOrFail($id);

        // Fetch all related transaction histories
        $transactions = LegalSearch::where('file_number', $result->file_number)
            ->orWhere('kangis_file_number', $result->kangis_file_number)
            ->orWhere('mlsf_no', $result->mlsf_no)
            ->orWhere('plot_number', $result->plot_number)
            ->orWhere('plan_number', $result->plan_number)
            ->orWhere('plot_description', $result->plot_description)
            ->get();

        return view('legal-search.report', compact('result', 'transactions'));
    }
}