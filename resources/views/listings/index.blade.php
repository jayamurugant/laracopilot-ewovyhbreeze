@extends('layouts.app')

@section('title', 'Browse Listings')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white via-blue-100 to-purple-200">
                Find What You Need
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-8">
                Discover amazing listings from trusted sellers and service providers
            </p>
        </div>

        <!-- Search Bar -->
        <div class="max-w-4xl mx-auto">
            <form method="GET" action="{{ route('listings.index') }}" class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ $search }}" placeholder="Search listings..." class="w-full px-6 py-4 rounded-xl bg-white/20 backdrop-blur-sm border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent">
                    </div>
                    <div class="lg:w-64">
                        <select name="category" class="w-full px-6 py-4 rounded-xl bg-white/20 backdrop-blur-sm border border-white/30 text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ $category === $cat ? 'selected' : '' }} class="text-gray-800">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Featured Listings -->
@if(count($featuredListings) > 0)
<section class="py-16 bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Listings</h2>
            <p class="text-xl text-gray-600">Hand-picked premium listings just for you</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(array_slice($featuredListings, 0, 3) as $listing)
            <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 border border-purple-200/50 overflow-hidden">
                <div class="relative">
                    <img src="{{ $listing['image'] }}" alt="{{ $listing['title'] }}" class="w-full h-64 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $listing['category'] }}</span>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $listing['title'] }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($listing['description'], 100) }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl font-bold text-purple-600">{{ $listing['price'] }}</span>
                        <span class="text-gray-500 text-sm">{{ $listing['location'] }}</span>
                    </div>
                    
                    <a href="{{ route('listings.show', $listing['id']) }}" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 text-center block">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Listings -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    @if($category)
                        {{ $category }} Listings
                    @elseif($search)
                        Search Results for "{{ $search }}"
                    @else
                        All Listings
                    @endif
                </h2>
                <p class="text-gray-600 mt-2">{{ count($listings) }} listings found</p>
            </div>
            
            <!-- Category Filter Buttons -->
            <div class="hidden lg:flex space-x-2">
                <a href="{{ route('listings.index') }}" class="px-4 py-2 rounded-lg {{ !$category ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-300">
                    All
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('listings.category', strtolower(str_replace(' ', '-', $cat))) }}" class="px-4 py-2 rounded-lg {{ $category === $cat ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors duration-300">
                    {{ $cat }}
                </a>
                @endforeach
            </div>
        </div>

        @if(count($listings) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($listings as $listing)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 overflow-hidden">
                <div class="relative">
                    <img src="{{ $listing['image'] }}" alt="{{ $listing['title'] }}" class="w-full h-48 object-cover">
                    @if($listing['featured'])
                    <div class="absolute top-3 left-3">
                        <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-2 py-1 rounded-full text-xs font-semibold">Featured</span>
                    </div>
                    @endif
                    <div class="absolute top-3 right-3">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">{{ $listing['category'] }}</span>
                    </div>
                </div>
                
                <div class="p-4">
                    <h3 class="font-bold text-gray-800 mb-2 line-clamp-1">{{ $listing['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($listing['description'], 80) }}</p>
                    
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-lg font-bold text-purple-600">{{ $listing['price'] }}</span>
                    </div>
                    
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        </svg>
                        {{ $listing['location'] }}
                    </div>
                    
                    <a href="{{ route('listings.show', $listing['id']) }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-2 rounded-lg font-semibold transition-all duration-300 text-center block text-sm">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">No listings found</h3>
            <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse all categories.</p>
            <a href="{{ route('listings.index') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                View All Listings
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold mb-4">Ready to List Your Item?</h2>
        <p class="text-xl text-purple-100 mb-8">Join thousands of sellers and reach millions of potential buyers</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="bg-white text-purple-600 hover:bg-purple-50 px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Create Listing
            </button>
            <button class="bg-purple-700/50 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-xl font-semibold hover:bg-purple-700/70 transition-all duration-300">
                Learn More
            </button>
        </div>
    </div>
</section>
@endsection