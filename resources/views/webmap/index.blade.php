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

                <!-- Map Controls -->
                <div class="flex flex-wrap gap-4 mb-6">
                    <div>
                        <label for="local_govt" class="block text-sm font-medium text-gray-700 mb-1">Local Government</label>
                        <select id="local_govt" name="local_govt" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">All Local Governments</option>
                            <option value="Kano Municipal">Kano Municipal</option>
                            <option value="Nassarawa">Nassarawa</option>
                            <option value="Dala">Dala</option>
                            <option value="Fagge">Fagge</option>
                            <option value="Gwale">Gwale</option>
                            <option value="Tarauni">Tarauni</option>
                            <option value="Ungogo">Ungogo</option>
                            <option value="Kumbotso">Kumbotso</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="land_use" class="block text-sm font-medium text-gray-700 mb-1">Land Use</label>
                        <select id="land_use" name="land_use" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">All Land Uses</option>
                            <option value="Residential">Residential</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Agricultural">Agricultural</option>
                            <option value="Mixed Use">Mixed Use</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="search_parcel" class="block text-sm font-medium text-gray-700 mb-1">Search by Parcel ID</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="search_parcel" id="search_parcel" class="focus:ring-green-500 focus:border-green-500 flex-1 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300" placeholder="Enter Parcel ID">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-r-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Map Container -->
                <div class="border border-gray-300 rounded-lg overflow-hidden mb-6">
                    <div class="h-[600px] bg-gray-100 relative">
                        <!-- This would be replaced with an actual map implementation using Leaflet, Google Maps, or similar -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="{{ asset('images/kano-map-placeholder.jpg') }}" alt="Kano State Map" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white p-4">
                                <svg class="h-16 w-16 text-green-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                <p class="text-xl font-bold mb-2">Interactive Map</p>
                                <p class="text-center max-w-md">In a real implementation, this would be an interactive map showing land parcels across Kano State.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map Tools -->
                    <div class="bg-gray-100 border-t border-gray-300 p-4 flex flex-wrap gap-4">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Zoom In
                        </button>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                            Zoom Out
                        </button>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Reset View
                        </button>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Download Map
                        </button>
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Print
                        </button>
                    </div>
                </div>

                <!-- Legend -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Map Legend</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-red-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Residential</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-blue-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Commercial</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-purple-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Industrial</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-yellow-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Agricultural</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-green-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Government</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-orange-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Educational</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-pink-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Religious</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-6 h-6 bg-gray-500 mr-2"></div>
                            <span class="text-sm text-gray-700">Undeveloped</span>
                        </div>
                    </div>
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

