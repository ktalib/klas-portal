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
  
         /**
          * Search by file number.
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
     
             // Create a dummy payment record
             $payment = Payment::create([
                 'reference' => 'DUMMY-' . time(),
                 'amount' => 10000, // Assuming the amount is ₦10,000
                 'status' => 'completed',
                 'service_code' => range(1000, 9999), 
                 'user_id' => Auth::id(),
             ]);
     
             // Redirect to the results view with the matching records
             return view('legal-search.results', compact('results'));
         }
     
         /**
          * Advanced search by plot details.
          */
         public function advancedSearch(Request $request)
         {
             $request->validate([
                 'file_number' => 'nullable|string|max:255',
                 'kangis_file_number' => 'nullable|string|max:255',
                 'mlsf_no' => 'nullable|string|max:255',
                 'plot_number' => 'nullable|string|max:255',
                 'plan_number' => 'nullable|string|max:255',
                 'plot_description' => 'nullable|string|max:255',
                 'assignor' => 'nullable|string|max:255',
                 'assignee' => 'nullable|string|max:255',
                 'registration_number' => 'nullable|string|max:255',
             ]);
     
             // Ensure at least one search parameter is provided
             if (!$request->file_number && !$request->kangis_file_number && !$request->mlsf_no && 
                 !$request->plot_number && !$request->plan_number && !$request->plot_description && 
                 !$request->assignor && !$request->assignee && !$request->registration_number) {
                 
                 return back()->with('error', 'At least one search parameter is required.')->withInput();
             }
     
             // Query the database for the provided search parameters
             $query = LegalSearch::query();
     
             if ($request->file_number) {
                 $query->where('file_number', 'like', '%' . $request->file_number . '%');
             }
             if ($request->kangis_file_number) {
                 $query->where('kangis_file_number', 'like', '%' . $request->kangis_file_number . '%');
             }
             if ($request->mlsf_no) {
                 $query->where('mlsf_no', 'like', '%' . $request->mlsf_no . '%');
             }
             if ($request->plot_number) {
                 $query->where('plot_number', 'like', '%' . $request->plot_number . '%');
             }
             if ($request->plan_number) {
                 $query->where('plan_number', 'like', '%' . $request->plan_number . '%');
             }
             if ($request->plot_description) {
                 $query->where('plot_description', 'like', '%' . $request->plot_description . '%');
             }
             if ($request->assignor) {
                 $query->where('assignor', 'like', '%' . $request->assignor . '%');
             }
             if ($request->assignee) {
                 $query->where('assignee', 'like', '%' . $request->assignee . '%');
             }
             if ($request->registration_number) {
                 $query->where('registration_number', 'like', '%' . $request->registration_number . '%');
             }
     
             $results = $query->get();
     
             // Check if any records were found
             if ($results->isEmpty()) {
                 return back()->with('error', 'No records found for the provided search parameters.')->withInput();
             }
     
             // Create a dummy payment record
             $payment = Payment::create([
                 'reference' => 'DUMMY-' . time(),
                 'amount' => 10000, // Assuming the amount is ₦10,000
                 'status' => 'completed',
                 'user_id' => Auth::id(),
             ]);
     
             // Redirect to the results view with the matching records
             return view('legal-search.results', compact('results'));
         }
     
         /**
          * Display the payment page.
          */
         public function payment()
         {
             return view('legal-search.payment');
         }
     
         /**
          * Process payment for legal search.
          */
         public function processPayment(Request $request)
         {
             $request->validate([
                 'payment_reference' => 'required|string',
                 'file_number' => 'required|string|max:255',
             ]);
     
             // Create a dummy payment record
             $payment = Payment::create([
                 'reference' => $request->payment_reference,
                 'amount' => 10000, // Assuming the amount is ₦10,000
                 'status' => 'completed',
                 'user_id' => Auth::id(),
             ]);
     
             // Find the legal search record
             $legalSearch = LegalSearch::where('file_number', $request->file_number)->first();
     
             if (!$legalSearch) {
                 return back()->with('error', 'No matching legal search record found.')->withInput();
             }
     
             // Update legal search record with payment details
             $legalSearch->service_code = 'SC-' . time();
             $legalSearch->payment_id = $payment->id;
             $legalSearch->status = 'completed';
             $legalSearch->save();
     
             return redirect()->route('legal-search.report')->with('success', 'Payment successful. Your search report is ready.');
         }
      
     
    /**
     * Display the search report.
     *
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
            ->orWhere('assignor', $result->assignor)
            ->orWhere('assignee', $result->assignee)
            ->orWhere('registration_number', $result->registration_number)
            ->get();
    
        return view('legal-search.report', compact('result', 'transactions'));
    }
    

    public function searchResults(Request $request)
    {
        $results = LegalSearch::all();

        return view('legal-search.results', compact('results'));
    }
}

