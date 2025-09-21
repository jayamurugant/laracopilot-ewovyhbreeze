<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BookingHub - Your Premier Booking Platform')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                        accent: '#06b6d4'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-white min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-check text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">BookingHub</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                    <a href="{{ route('listings.index') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">Listings</a>
                    
                    @if(session('user'))
                        @if(session('user.role') === 'SuperAdmin')
                            <a href="{{ route('superadmin.dashboard') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">Admin Dashboard</a>
                        @elseif(session('user.role') === 'Creator')
                            <a href="{{ route('creator.dashboard') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">Creator Dashboard</a>
                        @elseif(session('user.role') === 'EndUser')
                            <a href="{{ route('enduser.dashboard') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">My Dashboard</a>
                        @endif
                    @endif
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    @if(session('user'))
                        <div class="relative group">
                            <button class="flex items-center space-x-3 px-4 py-2 rounded-xl hover:bg-slate-100 transition-colors duration-200">
                                <img src="{{ session('user.avatar') }}" alt="{{ session('user.name') }}" class="w-8 h-8 rounded-full">
                                <span class="hidden md:block text-slate-700 font-medium">{{ session('user.name') }}</span>
                                <i class="fas fa-chevron-down text-slate-500 text-sm"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-200 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <p class="text-sm font-medium text-slate-900">{{ session('user.name') }}</p>
                                    <p class="text-xs text-slate-500">{{ session('user.role') }}</p>
                                </div>
                                @if(session('user.role') === 'SuperAdmin')
                                    <a href="{{ route('superadmin.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                @elseif(session('user.role') === 'Creator')
                                    <a href="{{ route('creator.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                    <a href="{{ route('creator.create-listing') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                        <i class="fas fa-plus mr-2"></i>Create Listing
                                    </a>
                                @elseif(session('user.role') === 'EndUser')
                                    <a href="{{ route('enduser.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                    <a href="{{ route('enduser.bookings') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
                                        <i class="fas fa-calendar mr-2"></i>My Bookings
                                    </a>
                                @endif
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-indigo-600 font-medium transition-colors duration-200">Login</a>
                        <a href="{{ route('signup') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-2 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">Sign Up</a>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-slate-700 hover:text-indigo-600 transition-colors duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white border-t border-slate-200 hidden">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('home') }}" class="block text-slate-700 hover:text-indigo-600 font-medium">Home</a>
                <a href="{{ route('listings.index') }}" class="block text-slate-700 hover:text-indigo-600 font-medium">Listings</a>
                @if(!session('user'))
                    <a href="{{ route('login') }}" class="block text-slate-700 hover:text-indigo-600 font-medium">Login</a>
                    <a href="{{ route('signup') }}" class="block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg font-semibold text-center">Sign Up</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-check text-white text-lg"></i>
                        </div>
                        <span class="text-xl font-bold">BookingHub</span>
                    </div>
                    <p class="text-slate-300 text-sm mb-4 leading-relaxed">
                        Your premier booking platform connecting creators with end users for seamless booking experiences.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-300">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-300">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-indigo-600 transition-colors duration-300">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Home</a></li>
                        <li><a href="{{ route('listings.index') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Browse Listings</a></li>
                        <li><a href="{{ route('signup') }}" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Become a Creator</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Help Center</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Event Booking</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Service Booking</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Venue Rental</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Equipment Rental</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-slate-400 mt-1"></i>
                            <div>
                                <p class="text-slate-300 text-sm">123 Booking Street</p>
                                <p class="text-slate-300 text-sm">Suite 100, City, State 12345</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-slate-400"></i>
                            <p class="text-slate-300 text-sm">+1 (555) 123-4567</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-slate-400"></i>
                            <p class="text-slate-300 text-sm">contact@bookinghub.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-slate-400 mb-4 md:mb-0">
                        © {{ date('Y') }} BookingHub. All rights reserved.
                    </div>
                    <div class="flex space-x-6 mb-4 md:mb-0">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Terms of Service</a>
                    </div>
                    <div class="text-sm text-slate-400">
                        Made with ❤️ <span class="text-white font-medium">LaraCopilot</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        $('#mobile-menu-btn').click(function() {
            $('#mobile-menu').toggleClass('hidden');
        });

        // Smooth scrolling
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    </script>
</body>
</html>