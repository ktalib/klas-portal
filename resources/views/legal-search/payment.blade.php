@extends('layouts.app')

@section('title', 'Payment')

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
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                 
           <div class="text-left ml-4">
            <img src="https://i.ibb.co/pSpyR5B/Whats-App-Image-2025-02-21-at-7-06-36-AM.jpg"  class="h-16 w-auto mb-4">
            <h2 class="text-gray-900">
                <strong>
                KLAS (KANO STATE LAND ADMIN SYSTEM)
                </strong>
            </h2>
           </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Portal</h2>

                <p class="text-gray-600 mb-4">
                    Select your file number and enter the code sent to your phone. 
                    If payment is pending, please click "Make Payment" to proceed.
                </p>

                <!-- Make Payment Section -->
                <div>
                    <form action="{{ route('legal-search.process-payment') }}" method="POST">
                        @csrf
                        <button type="submit" id="make-payment-btn" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Make Payment
                        </button>
                    </form>
                </div>

                <!-- Search Section -->

                
                <div class="mt-6">
                    <div class="mb-4">
                        <label for="service_code" class="block text-sm font-medium text-gray-700">Service Code</label>
                        <input type="text" name="service_code" id="service_code" 
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="Auto-filled after payment" readonly>
                    </div>

                    <div class="mb-4">
                        <label for="reference_code" class="block text-sm font-medium text-gray-700">Reference Code</label>
                        <input type="text" name="reference_code" id="reference_code" 
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            placeholder="Auto-filled after payment" readonly>
                    </div>

                    <div>
                        <a href="{{ route('legal-search.results') }}" id="search-btn" disabled
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-400 cursor-not-allowed">
                            Search
                        </a>
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

        var searchBtn = document.getElementById("search-btn");
        // Prevent clicking when the search button is disabled
        searchBtn.addEventListener("click", function(e) {
            if (searchBtn.hasAttribute("disabled")) {
                e.preventDefault();
            }
        });

        // Simulate the backend response after a successful payment
        let serviceCode = "{{ session('service_code') }}";
        let referenceCode = "{{ session('reference') }}";
        
        if (serviceCode && referenceCode) {
            document.getElementById("service_code").value = serviceCode;
            document.getElementById("reference_code").value = referenceCode;
            searchBtn.removeAttribute("disabled");
            searchBtn.classList.remove("bg-gray-400", "cursor-not-allowed");
            searchBtn.classList.add("bg-green-600", "hover:bg-green-700");
        }
    });

    window.addEventListener('beforeunload', function (event) {
        // Clear the search_performed session variable
        sessionStorage.removeItem('search_performed');
    });
</script>

@endsection
