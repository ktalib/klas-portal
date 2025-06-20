@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<style>
    #preloader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(5px);
    }

    #preloader img {
        width: 100px; /* Adjust the size as needed */
        height: auto;
    }

    body.loading {
        overflow: hidden;
    }

    body.loading .pc-container {
        filter: blur(5px);
    }
</style>
<div id="preloader">
    <img src="https://kangis-demo.tozinh.site/1.png" alt="Loading...">
</div>
<div class="py-12 bg-gray-50" style="display: none;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             
           <div class="text-left ml-4">
            <img src="https://i.ibb.co/pSpyR5B/Whats-App-Image-2025-02-21-at-7-06-36-AM.jpg"  class="h-16 w-auto mb-4">
            <h2 class="text-gray-900">
                <strong>
                KLAS (KANO STATE LAND ADMIN SYSTEM)
                </strong>
            </h2>
           </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Search Results</h2>

                @if($results->isNotEmpty())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plot Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certificate Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($results as $result)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $result->file_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $result->plot_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $result->assignee }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $result->location }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $result->certificate_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('legal-search.report', $result->id) }}" class="text-green-600 hover:text-green-900">Generate Search</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">No records found.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if(isset($result))
<div id="reportView">
    <div class="container mx-auto mt-4 p-4">
         
           <div class="text-left ml-4">
            <img src="https://i.ibb.co/pSpyR5B/Whats-App-Image-2025-02-21-at-7-06-36-AM.jpg"  class="h-16 w-auto mb-4">
            <h2 class="text-gray-900">
                <strong>
                KLAS (KANO STATE LAND ADMIN SYSTEM)
                </strong>
            </h2>
           </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Search Results</h2>
        <div class="bg-white rounded-lg shadow-md mb-4">
            <div class="bg-blue-500 text-white p-3 rounded-t-lg">Property Details</div>
            <div class="p-4">
                <p><strong>File Number:</strong> {{ $result->file_number }} | kangisFileNo: {{ $result->kangis_file_number }} | mlsfNo: {{ $result->mlsf_no }}</p>
                <p><strong>Plot Number:</strong> {{ $result->plot_number }}</p>
                <p><strong>Plot Description:</strong> {{ $result->plot_description }}</p>
                <p><strong>Plan Number:</strong> {{ $result->plan_number }}</p>
                <p><strong>Schedule:</strong> {{ $result->schedule }}</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md mb-4">
            <div class="bg-gray-600 text-white p-3 rounded-t-lg">Transaction History</div>
            <div class="p-4">
                <table class="w-full text-sm text-left text-gray-500 border-collapse border border-gray-300">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="py-3 px-4 border border-gray-300">S/N</th>
                            <th class="py-3 px-4 border border-gray-300">Assignor</th>
                            <th class="py-3 px-4 border border-gray-300">Assignee</th>
                            <th class="py-3 px-4 border border-gray-300">Instrument Type</th>
                            <th class="py-3 px-4 border border-gray-300">Date</th>
                            <th class="py-3 px-4 border border-gray-300">Reg. No.</th>
                            <th class="py-3 px-4 border border-gray-300">Size</th>
                            <th class="py-3 px-4 border border-gray-300">Caveat</th>

                            <th class="py-3 px-4 border border-gray-300">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $transaction)
                            <tr class="bg-white border-b">
                                <td class="py-4 px-4 border border-gray-300">{{ $loop->iteration }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->assignor }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->assignee }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->instrument_type }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->transaction_date }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->registration_number }}</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->size }}</td> <td class="py-4 px-4 border border-gray-300">No</td>
                                <td class="py-4 px-4 border border-gray-300">{{ $transaction->comments }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Note:</strong>
            <span class="block sm:inline">This property has an active caveat due to an ongoing legal dispute.</span>
        </div>
        <div class="text-center">
            <a href="{{ route('legal-search.report', $result->id) }}"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">Generate pdf</a>
            
            <button onclick="printReport()" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Print Report</button>
</div> 

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var preloader = document.getElementById('preloader');
        document.body.classList.add('loading');
        setTimeout(function() {
            preloader.style.display = 'none';
            document.body.classList.remove('loading');
        }, 2000); // Adjust the time as needed
    });

    function printReport() {
        var reportView = document.getElementById("reportView");
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = reportView.outerHTML;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>
@endif
@endsection
<style type="text/css">
    @media print {
        body * {
            visibility: hidden;
        }
        #reportView, #reportView * {
            visibility: visible;
        }
        #reportView {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>