@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<div class="relative">
    <!-- Hero Section -->
    <div class="relative bg-green-700">
        <div class="absolute inset-0">
            <img src="{{ asset('images/services-hero.jpg') }}" alt="Services" class="w-full h-full object-cover opacity-30">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Our Services</h1>
            <p class="mt-6 max-w-3xl text-xl text-green-100">Explore the range of land-related services offered by the Kano State Geographic Information System.</p>
        </div>
    </div>

    <!-- Services Section -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-green-600 font-semibold tracking-wide uppercase">Main Services on KANGIS Web Portal</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Comprehensive Land Management Solutions
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    The KANGIS Web Portal offers a range of land-related services designed to help landowners, applicants, and officials manage land records and processes in Kano State.
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <!-- First Registration -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">First Registration</h3>
                            <p class="mt-2 text-base text-gray-500">
                                For registering land that has never been documented before. Captures ownership details, survey data, and parcel information.
                            </p>
                        </div>
                    </div>

                    <!-- Regularization -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Regularization</h3>
                            <p class="mt-2 text-base text-gray-500">
                                For updating or correcting records of existing but unregistered or incomplete land documentation. Helps integrate informal or older records into the official database.
                            </p>
                        </div>
                    </div>

                    <!-- Recertification -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Recertification</h3>
                            <p class="mt-2 text-base text-gray-500">
                                For revalidating land documents to ensure they are accurate and up-to-date. Often done to renew or verify ownership and property details.
                            </p>
                        </div>
                    </div>

                    <!-- Fresh Allocation -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Fresh Allocation</h3>
                            <p class="mt-2 text-base text-gray-500">
                                For obtaining new land allocations directly from the government. Manages the process from application to approval.
                            </p>
                        </div>
                    </div>

                    <!-- Legal Search -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Legal Search</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Search for details of any plot or land file in the KANGIS system. Allows you to check ownership, status, and verify documents. Comes with online payment options to obtain certified search reports.
                            </p>
                        </div>
                    </div>

                    <!-- Payment and Billing Services -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Payment and Billing Services</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Online bill generation and payment of fees via integrated platforms like PayStack. Automated receipt generation.
                            </p>
                        </div>
                    </div>

                    <!-- Web Mapping (GIS Services) -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Web Mapping (GIS Services)</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Visual map interface to view plot locations, boundaries, and related geographic data.
                            </p>
                        </div>
                    </div>

                    <!-- User Account Management -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">User Account Management</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Create, manage, and modify portal user accounts. Role-based access for applicants, administrators, and officials.
                            </p>
                        </div>
                    </div>

                    <!-- Contact and Support -->
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Contact and Support</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Direct communication with KANGIS for inquiries or help.
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
                <span class="block">Interested in our services?</span>
                <span class="block text-yellow-300">Get started with KANGIS today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-600 bg-white hover:bg-green-50">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection