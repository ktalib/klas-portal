@extends('layouts.app')

@section('title', 'Kano State Webmap')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Kano State Webmap</h2>
                
                <div class="mb-8">
                    <p class="text-gray-600 mb-4">
                        The interactive digital map provides spatial visualization of properties across Kano State. Use the tools below to navigate and search for specific parcels.
                    </p>
                </div>

               
                <!-- Map Container -->
                <div class="border border-gray-300 rounded-lg overflow-hidden mb-6">
                    <iframe src="https://kangis.maps.arcgis.com/apps/mapviewer/index.html?webmap=6ac7cf9fd13e4a1cb6fb5634a7bf2f73" 
                            width="100%" 
                            height="600" 
                            style="border:0;"></iframe>
                </div>
                  
                <!-- Help Information -->
                <div class="rounded-md bg-blue-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Need Help?</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <p>
                                    For assistance with using the webmap or interpreting the data, please contact our GIS department at <a href="mailto:gis@kangis.gov.ng" class="font-medium underline">gis@kangis.gov.ng</a> or call +234 (0) 123 456 7890.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

