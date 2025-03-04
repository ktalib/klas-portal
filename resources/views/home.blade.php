@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="relative">
    <!-- Hero Section -->
    <div class="relative bg-green-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/kano-city-aerial.jpg') }}" alt="Kano City Aerial View" class="w-full h-full object-cover opacity-30">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Kano State Geographic Information System</h1>
            <p class="mt-6 max-w-3xl text-xl text-green-100">Streamlining land administration services in Kano State with secure, transparent, and efficient access to land records.</p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-white hover:bg-green-50">
                    Our Services
                </a>
                <a href="{{ route('legal-search') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600">
                    Legal Search
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    A better way to manage land records
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    KANGIS provides digital access to land-related services, helping automate tasks that were previously manual.
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">First Registration</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Register new land parcels with our streamlined digital process, ensuring secure and accurate documentation.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Legal Search</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Search for land records by file number or using search filters based on plot registration details.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Recertification</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Periodic verification and validation of land documentation to ensure records remain current and accurate.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Online Payments</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Secure online payments for land services with automated invoices and receipts for all transactions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-green-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to get started?</span>
                <span class="block text-yellow-300">Create an account today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50">
                        Register
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-800 hover:bg-green-900">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

