<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalSearch;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

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

        // In a real application, you would search the database for the file number
        // For this example, we'll just redirect to the results page
        
        // Create a payment record for the search
        $payment = new Payment();
        $payment->user_id = Auth::id() ?? null;
        $payment->amount = 10000; // ₦10,000
        $payment->payment_type = 'legal_search';
        $payment->reference = 'LS-' . time();
        $payment->status = 'pending';
        $payment->save();

        // Redirect to payment page (in a real app)
        // For this example, we'll just show the results
        return view('legal-search.results');
    }

    /**
     * Advanced search by plot details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function advancedSearch(Request $request)
    {
        $request->validate([
            'owner_name' => 'nullable|string|max:255',
            'plot_number' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'certificate_number' => 'nullable|string|max:255',
        ]);

        // Ensure at least one search parameter is provided
        if (!$request->owner_name && !$request->plot_number && !$request->location && !$request->certificate_number) {
            return back()->withErrors(['search' => 'At least one search parameter is required.'])->withInput();
        }

        // In a real application, you would search the database for the plot details
        // For this example, we'll just redirect to the results page
        
        // Create a payment record for the search
        $payment = new Payment();
        $payment->user_id = Auth::id() ?? null;
        $payment->amount = 10000; // ₦10,000
        $payment->payment_type = 'legal_search';
        $payment->reference = 'LS-' . time();
        $payment->status = 'pending';
        $payment->save();

        // Redirect to payment page (in a real app)
        // For this example, we'll just show the results
        return view('legal-search.results');
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
        ]);

        // In a real application, you would verify the payment with PayStack
        // For this example, we'll just update the payment status
        
        $payment = Payment::where('reference', $request->payment_reference)->first();
        
        if ($payment) {
            $payment->status = 'completed';
            $payment->save();
            
            return redirect()->route('legal-search.results')->with('success', 'Payment successful. Your search results are ready.');
        }
        
        return back()->withErrors(['payment' => 'Payment verification failed.'])->withInput();
    }
}

