<nav class="bg-green-600 border-b border-green-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                  
 {{--   --}}
                        <img src="https://i.ibb.co/cSPdM5JR/Whats-App-Image-2025-02-28-at-4-01-36-PM-1.jpg" alt="KANGIS Logo" class="h-12 w-auto">
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                        About
                    </a>
                    <a href="{{ route('services') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                        Services
                    </a>
                    <a href="{{ route('legal-search') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                       Conduct A Legal Search Online
                    </a>
                    <a href="{{ route('webmap') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                        Webmap
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-yellow-200 hover:border-yellow-300 focus:outline-none focus:text-yellow-200 focus:border-yellow-300 transition duration-150 ease-in-out">
                        Contact
                    </a>
                </div>

                
            </div>

            <img src="https://i.ibb.co/p6fGzp43/Whats-App-Image-2025-02-28-at-4-01-36-PM.jpg" alt="KANGIS Logo" class="h-12 w-auto">
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <div class="ml-3 relative">
                        <div class="flex items-center">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out text-white">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-yellow-200 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium">Register</a>
                @endauth
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-yellow-200 hover:bg-green-700 focus:outline-none focus:bg-green-700 focus:text-yellow-200 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

