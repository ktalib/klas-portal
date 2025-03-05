<!-- filepath: /c:/wamp64/www/klas-portal/resources/views/legal-search/payment.blade.php -->
@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment</h2>

                <form action="{{ route('legal-search.process-payment') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="file_number" class="block text-sm font-medium text-gray-700">File Number</label>
                        <input type="text" name="file_number" id="file_number" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter file number">
                    </div>
                    <div class="mb-4">
                        <label for="payment_reference" class="block text-sm font-medium text-gray-700">Payment Reference</label>
                        <input type="text" name="payment_reference" id="payment_reference" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter payment reference">
                    </div>

                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Process Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection