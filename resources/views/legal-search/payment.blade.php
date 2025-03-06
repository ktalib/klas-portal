@extends('layouts.app')

@section('title', 'Payment')

@section('content')

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
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
                        <a  href="{{ route('legal-search.results') }}" id="search-btn" disabled
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
    // Simulate the backend response after a successful payment
    document.addEventListener("DOMContentLoaded", function () {
        let serviceCode = "{{ session('service_code') }}";
        let referenceCode = "{{ session('reference') }}";
        
        if (serviceCode && referenceCode) {
            document.getElementById("service_code").value = serviceCode;
            document.getElementById("reference_code").value = referenceCode;

            let searchBtn = document.getElementById("search-btn");
            searchBtn.disabled = false;
            searchBtn.classList.remove("bg-gray-400", "cursor-not-allowed");
            searchBtn.classList.add("bg-green-600", "hover:bg-green-700");
        }
    });
</script>

@endsection
