@extends('layouts.app')

@section('title', 'Legal Search')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Legal Search</h2>

                <div class="mb-8">
                    <p class="text-gray-600 mb-4">
                        Please enter the file number to search for legal records. A processing fee of ₦10,000 is required to access the search results.
                    </p>
                </div>

                <!-- File Number Search Form -->
                <div id="file-number-search" class="mb-8">
                    <form action="{{ route('legal-search.search') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="file_number" class="block text-sm font-medium text-gray-700">File Number</label>
                            <div class="mt-1">
                                <input type="text" name="file_number" id="file_number" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter file number" required>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Search
                            </button>
                        </div>
                    </form>
                </div>

                <div class="rounded-md bg-yellow-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <!-- Icon content -->
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Search Fee Information</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                A processing fee of ₦10,000 is required to access the search results and reports.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection