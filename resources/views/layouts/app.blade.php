<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Listings Platform - Find What You Need')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">ListingHub</h1>
                        <p class="text-sm text-gray-600">Find What You Need</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Home</a>
                    <a href="{{ route('listings.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 {{ request()->routeIs('listings.*') ? 'text-blue-600' : '' }}">Browse Listings</a>
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 flex items-center">
                            Categories
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-2">
                                <a href="{{ route('listings.category', 'real-estate') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Real Estate</a>
                                <a href="{{ route('listings.category', 'jobs') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Jobs</a>
                                <a href="{{ route('listings.category', 'electronics') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Electronics</a>
                                <a href="{{ route('listings.category', 'services') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Services</a>
                                <a href="{{ route('listings.category', 'automotive') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Automotive</a>
                                <a href="{{ route('listings.category', 'fashion') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">Fashion</a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">About</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300">Contact</a>
                </nav>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-4">
                    <button class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                        Post Listing
                    </button>
                    <a href="{{ route('admin.login') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium transition-all duration-300">
                        Admin
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-700 hover:text-blue-600 transition-colors duration-300" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="md:hidden hidden border-t border-gray-200 py-4">
                <div class="space-y-2">
                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 rounded-lg">Home</a>
                    <a href="{{ route('listings.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 rounded-lg">Browse Listings</a>
                    <div class="px-4 py-2">
                        <div class="text-gray-500 text-sm font-medium mb-2">Categories</div>
                        <div class="space-y-1 ml-4">
                            <a href="{{ route('listings.category', 'real-estate') }}" class="block py-1 text-gray-600 hover:text-blue-600 transition-colors duration-300">Real Estate</a>
                            <a href="{{ route('listings.category', 'jobs') }}" class="block py-1 text-gray-600 hover:text-blue-600 transition-colors duration-300">Jobs</a>
                            <a href="{{ route('listings.category', 'electronics') }}" class="block py-1 text-gray-600 hover:text-blue-600 transition-colors duration-300">Electronics</a>
                            <a href="{{ route('listings.category', 'services') }}" class="block py-1 text-gray-600 hover:text-blue-600 transition-colors duration-300">Services</a>
                        </div>
                    </div>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 rounded-lg">About</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 rounded-lg">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Four Column Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                
                <!-- Column 1: Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold">ListingHub</h3>
                    </div>
                    <p class="text-slate-300 text-sm mb-4 leading-relaxed">
                        Your trusted marketplace for finding and listing everything from real estate to services. Connect with buyers and sellers in your area.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Home</a></li>
                        <li><a href="{{ route('listings.index') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Browse Listings</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Post a Listing</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">About Us</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Contact</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Help Center</a></li>
                    </ul>
                </div>

                <!-- Column 3: Categories -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('listings.category', 'real-estate') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Real Estate</a></li>
                        <li><a href="{{ route('listings.category', 'jobs') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Jobs</a></li>
                        <li><a href="{{ route('listings.category', 'electronics') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Electronics</a></li>
                        <li><a href="{{ route('listings.category', 'services') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Services</a></li>
                        <li><a href="{{ route('listings.category', 'automotive') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Automotive</a></li>
                        <li><a href="{{ route('listings.category', 'fashion') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Fashion</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-slate-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <div>
                                <p class="text-slate-300 text-sm">123 Marketplace Street</p>
                                <p class="text-slate-300 text-sm">Suite 100, City, State 12345</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <p class="text-slate-300 text-sm">+1 (555) 123-4567</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-slate-300 text-sm">support@listinghub.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Border and Copyright -->
            <div class="border-t border-slate-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Left: Copyright -->
                    <div class="text-sm text-slate-400 mb-4 md:mb-0">
                        © {{ date('Y') }} ListingHub. All rights reserved.
                    </div>
                    
                    <!-- Center: Privacy Links -->
                    <div class="flex space-x-6 mb-4 md:mb-0">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Terms of Service</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Cookie Policy</a>
                    </div>
                    
                    <!-- Right: LaraCopilot Branding -->
                    <div class="text-sm text-slate-400">
                        Made with ❤️ <span class="text-white font-medium">LaraCopilot</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>