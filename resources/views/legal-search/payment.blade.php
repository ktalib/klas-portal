<!-- filepath: /c:/wamp64/www/klas-portal/resources/views/legal-search/payment.blade.php -->
@extends('layouts.app')

@section('title', 'Payment')

@section('content')

@if($results->isNotEmpty())
    @php $result = $results->first(); @endphp
 
    <input type="hidden" name="plot_number" id="plot_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{  $result->plot_number }}">
 
 

@else
    <p class="text-gray-600">No records found.</p>
@endif
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Portal</h2>
                
                <!-- Tabs -->
                <div class="mb-6">
                    <nav class="flex">
                        <a href="#make-payment" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-t-md hover:bg-gray-100">Make Payment</a>
                        <a href="#view-search" class="px-4 py-2 ml-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-t-md hover:bg-gray-100">View Search</a>
                    </nav>
                </div>

                <!-- Make Payment Section -->
                <div id="make-payment" class="tab-content">
                    <form action="{{ route('legal-search.process-payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="file_number" id="file_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter file number">
                        <input type="hidden" name="payment_reference" id="payment_reference" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter payment reference">
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Process Payment
                            </button>
                        </div>
                    </form>
                </div>

                <!-- View Search Section -->
                <div id="view-search" class="tab-content hidden">
                    {{-- <form action="{{ route('legal-search.results') }}" method="POST">
                        @csrf --}}
                        <div class="mb-4">
                            <label for="file_number" class="block text-sm font-medium text-gray-700">File Number</label>
                            <input type="text" name="file_number" id="file_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter file number">
                        </div>
                        <div class="mb-4">
                            <label for="payment_reference" class="block text-sm font-medium text-gray-700">Payment Reference</label>
                            <input type="text" name="payment_reference" id="payment_reference" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter payment reference">
                        </div>
                        <div>
                            <a  href="{{ route('legal-search.results') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Submit
                            </a>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('nav a');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                tabs.forEach(t => t.classList.remove('bg-gray-100'));
                contents.forEach(c => c.classList.add('hidden'));

                tab.classList.add('bg-gray-100');
                document.querySelector(tab.getAttribute('href')).classList.remove('hidden');
            });
        });
    });
</script>
@endsection