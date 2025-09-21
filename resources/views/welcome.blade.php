@extends('layouts.app')

@section('title', 'BookingHub - Your Premier Booking Platform')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/20 to-purple-500/20"></div>
    
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-pulse animation-delay-2000"></div>
    </div>

    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white via-purple-100 to-indigo-200">
            Book Anything, Anywhere
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-purple-100 max-w-3xl mx-auto">
            Connect with creators and book amazing spaces, services, and experiences with just a few clicks
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <a href="{{ route('listings.index') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-search mr-2"></i>Explore Listings
            </a>
            <a href="{{ route('signup') }}" class="bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-user-plus mr-2"></i>Join as Creator
            </a>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold mb-2">{{ number_format($stats['total_listings']) }}+</div>
                <div class="text-purple-200 text-sm md:text-base">Active Listings</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold mb-2">{{ number_format($stats['total_bookings']) }}+</div>
                <div class="text-purple-200 text-sm md:text-base">Bookings Made</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold mb-2">{{ number_format($stats['happy_customers']) }}+</div>
                <div class="text-purple-200 text-sm md:text-base">Happy Customers</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold mb-2">{{ $stats['cities'] }}+</div>
                <div class="text-purple-200 text-sm md:text-base">Cities</div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Featured Listings -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">Featured Listings</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">Discover amazing spaces and services from our top-rated creators</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredListings as $listing)
            <div class="bg-white rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ $listing['image'] }}" alt="{{ $listing['title'] }}" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $listing['category'] }}
                        </span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <div class="bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 flex items-center space-x-1">
                            <i class="fas fa-star text-yellow-500 text-sm"></i>
                            <span class="text-sm font-semibold text-slate-800">{{ $listing['rating'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $listing['title'] }}</h3>
                    <p class="text-slate-600 mb-4">{{ $listing['description'] }}</p>
                    <div class="flex items-center text-slate-500 mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="text-sm">{{ $listing['location'] }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-slate-800">
                            ${{ $listing['price'] }}<span class="text-sm text-slate-500 font-normal">/hour</span>
                        </div>
                        <a href="{{ route('listings.show', $listing['id']) }}" 
                           class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-0.5">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('listings.index') }}" 
               class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-th-large mr-2"></i>View All Listings
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 text-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Why Choose BookingHub?</h2>
            <p class="text-xl text-purple-100 max-w-3xl mx-auto">Experience the future of booking with our innovative platform</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Secure Payments</h3>
                <p class="text-purple-100">Multiple payment gateways including Razorpay and Stripe for secure transactions.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-calendar-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Easy Scheduling</h3>
                <p class="text-purple-100">Interactive calendar booking system with real-time availability updates.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Multi-Role System</h3>
                <p class="text-purple-100">Dedicated dashboards for SuperAdmins, Creators, and End Users.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Mobile Optimized</h3>
                <p class="text-purple-100">Fully responsive design that works perfectly on all devices.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Analytics Dashboard</h3>
                <p class="text-purple-100">Comprehensive analytics and reporting for all user roles.</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">24/7 Support</h3>
                <p class="text-purple-100">Round-the-clock customer support to help you with any questions.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">Ready to Get Started?</h2>
        <p class="text-xl text-slate-600 mb-8">Join thousands of users who trust BookingHub for their booking needs</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('signup') }}" 
               class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-rocket mr-2"></i>Start Booking Now
            </a>
            <a href="{{ route('login') }}" 
               class="bg-white border-2 border-slate-300 hover:border-indigo-500 text-slate-700 hover:text-indigo-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </a>
        </div>
    </div>
</section>

<style>
    .animation-delay-2000 {
        animation-delay: 2s;
    }
</style>
@endsection