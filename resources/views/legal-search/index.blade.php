@extends('layouts.app')

@section('title', 'Legal Search')

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
    <img src="http://klas.com.ng/storage/upload/logo/klas_logo.gif" alt="Loading...">
</div>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          
           <div class="text-left ml-4">
            <img src="http://klas.com.ng/storage/upload/logo/1.jpeg"  class="h-16 w-auto mb-4">
            <h2 class="text-gray-900">
                <strong>
                KLAS (KANO STATE LAND ADMIN SYSTEM)
                </strong>
            </h2>
           </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Legal Search</h2>
                
                <div class="mb-8">
                    <p class="text-gray-600 mb-4">
                        The Legal Search module allows you to search for land records by entering a File Number (if known) or by using search filters based on plot registration details.
                    </p>
                </div>

                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                A legal search report is required for all land transactions in Kano State. The search fee is non-refundable.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Search Tabs -->
                <div class="mb-8">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex">
                            <a href="#" class="border-green-500 text-green-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="file-number-tab">
                                Search by File Number
                            </a>
                            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm ml-8" id="details-tab">
                                Search by Plot Details
                            </a>
                        </nav>
                    </div>
                </div>

               
   <!-- File Number Search Form -->
<div id="file-number-search" class="mb-8">
    <form action="{{ route('legal-search.search') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="file_number" class="block text-sm font-medium text-gray-700">File Number</label>
            <div class="mt-1">
            <input type="text" name="file_number" id="file_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter file number (e.g., KN0001, kangisFileNo, or mlsfNo)">
            </div>
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Search
            </button>
            {{-- <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="generateSearch()">
                Generate Search
            </button> --}}
        </div>
    </form>
</div>

<!-- Plot Details Search Form -->
<div id="details-search" class="hidden mb-8">
    <form action="{{ route('legal-search.advanced-search') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="file_number" class="block text-sm font-medium text-gray-700">NEWKANGISFileNo</label>
                <div class="mt-1">
                    <input type="text" name="file_number" id="file_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter NEWKANGIS file number">
                </div>
            </div>
            <div>
                <label for="kangis_file_number" class="block text-sm font-medium text-gray-700">KANGISFileNo</label>
                <div class="mt-1">
                    <input type="text" name="kangis_file_number" id="kangis_file_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter KANGIS file number">
                </div>
            </div>
            <div>
                <label for="mlsf_no" class="block text-sm font-medium text-gray-700">MLSFileNo</label>
                <div class="mt-1">
                    <input type="text" name="mlsf_no" id="mlsf_no" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter MLSF number">
                </div>
            </div>
            <div>
                <label for="plot_number" class="block text-sm font-medium text-gray-700">Plot Number</label>
                <div class="mt-1">
                    <input type="text" name="plot_number" id="plot_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter plot number">
                </div>
            </div>
            <div>
                <label for="plan_number" class="block text-sm font-medium text-gray-700">Plan Number</label>
                <div class="mt-1">
                    <input type="text" name="plan_number" id="plan_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter plan number">
                </div>
            </div>
            <div>
                <label for="plot_description" class="block text-sm font-medium text-gray-700">Plot Description</label>
                <div class="mt-1">
                    <input type="text" name="plot_description" id="plot_description" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter plot description">
                </div>
            </div>
            <div>
                <label for="assignor" class="block text-sm font-medium text-gray-700">Assignor</label>
                <div class="mt-1">
                    <input type="text" name="assignor" id="assignor" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter assignor">
                </div>
            </div>
            <div>
                <label for="assignee" class="block text-sm font-medium text-gray-700">Assignee</label>
                <div class="mt-1">
                    <input type="text" name="assignee" id="assignee" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter assignee">
                </div>
            </div>
            <div>
                <label for="registration_number" class="block text-sm font-medium text-gray-700">Registration Number</label>
                <div class="mt-1">
                    <input type="text" name="registration_number" id="registration_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter registration number">
                </div>
            </div>
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Search
            </button>
            {{-- <button type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="generateSearch()">
                Generate Search
            </button> --}}
        </div>
    </form>
</div>

<script>
    function generateSearch() {
        // Redirect to the payment page or handle the payment process
        window.location.href = "{{ route('legal-search.payment') }}";
    }
</script>
                <!-- Search Fee Information -->
                <div class="rounded-md bg-yellow-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Search Fee Information</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p>
                                    The legal search fee is ₦10,000 per property. Payment can be made online via PayStack after submitting your search request.
                                </p>
                            </div>
                            <div class="mt-4">
                                <div class="-mx-2 -my-1.5 flex">
                                    <a href="{{ route('services.fees') }}" class="bg-yellow-50 px-2 py-1.5 rounded-md text-sm font-medium text-yellow-800 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-yellow-50 focus:ring-yellow-600">
                                        View Fee Schedule
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
  
        document.addEventListener('DOMContentLoaded', function() {
        const fileNumberTab = document.getElementById('file-number-tab');
        const detailsTab = document.getElementById('details-tab');
        const fileNumberSearch = document.getElementById('file-number-search');
        const detailsSearch = document.getElementById('details-search');

        fileNumberTab.addEventListener('click', function(e) {
            e.preventDefault();
            fileNumberTab.classList.add('border-green-500', 'text-green-600');
            fileNumberTab.classList.remove('border-transparent', 'text-gray-500');
            detailsTab.classList.add('border-transparent', 'text-gray-500');
            detailsTab.classList.remove('border-green-500', 'text-green-600');
            fileNumberSearch.classList.remove('hidden');
            detailsSearch.classList.add('hidden');
        });

        detailsTab.addEventListener('click', function(e) {
            e.preventDefault();
            detailsTab.classList.add('border-green-500', 'text-green-600');
            detailsTab.classList.remove('border-transparent', 'text-gray-500');
            fileNumberTab.classList.add('border-transparent', 'text-gray-500');
            fileNumberTab.classList.remove('border-green-500', 'text-green-600');
            detailsSearch.classList.remove('hidden');
            fileNumberSearch.classList.add('hidden');
        });
    });
</script>
@endsection

