@extends('layouts.app')

@section('title', 'Browse Listings - BookingHub')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">Discover Amazing Listings</h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">Find the perfect space or service for your needs</p>
        </div>

        <!-- Filters -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg border border-white/50 p-6 mb-12">
            <div class="flex flex-col md:flex-row gap-4 items-center">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search listings..." 
                               class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <i class="fas fa-search text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $category)
                    <button class="category-filter px-4 py-2 rounded-xl font-medium transition-all duration-300 
                                   {{ $category === 'All' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white' : 'bg-slate-200 text-slate-700 hover:bg-slate-300' }}"
                            data-category="{{ $category }}">
                        {{ $category }}
                    </button>
                    @endforeach
                </div>

                <!-- Sort -->
                <select id="sortSelect" class="px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <option value="featured">Featured</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="rating">Highest Rated</option>
                </select>
            </div>
        </div>

        <!-- Listings Grid -->
        <div id="listingsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($listings as $listing)
            <div class="listing-card bg-white rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-3 overflow-hidden group"
                 data-category="{{ $listing['category'] }}" data-price="{{ $listing['price'] }}" data-rating="{{ $listing['rating'] }}">
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
                    <div class="absolute bottom-4 right-4">
                        <button class="w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-colors duration-300">
                            <i class="fas fa-heart text-slate-400 hover:text-red-500"></i>
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">{{ $listing['title'] }}</h3>
                    <p class="text-slate-600 mb-4 line-clamp-2">{{ $listing['description'] }}</p>
                    <div class="flex items-center text-slate-500 mb-4">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="text-sm">{{ $listing['location'] }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <img src="{{ $listing['creator']['avatar'] }}" alt="{{ $listing['creator']['name'] }}" 
                             class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-medium text-slate-800">{{ $listing['creator']['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $listing['creator']['total_bookings'] }} bookings</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-slate-800">
                            ${{ $listing['price'] }}<span class="text-sm text-slate-500 font-normal">/hour</span>
                        </div>
                        <a href="{{ route('listings.show', $listing['id']) }}" 
                           class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-2 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-0.5">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-plus mr-2"></i>Load More Listings
            </button>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Category filtering
    $('.category-filter').click(function() {
        const category = $(this).data('category');
        
        // Update active button
        $('.category-filter').removeClass('bg-gradient-to-r from-indigo-600 to-purple-600 text-white')
                            .addClass('bg-slate-200 text-slate-700 hover:bg-slate-300');
        $(this).removeClass('bg-slate-200 text-slate-700 hover:bg-slate-300')
               .addClass('bg-gradient-to-r from-indigo-600 to-purple-600 text-white');
        
        // Filter listings
        if (category === 'All') {
            $('.listing-card').fadeIn(300);
        } else {
            $('.listing-card').fadeOut(300);
            $(`.listing-card[data-category="${category}"]`).fadeIn(300);
        }
    });

    // Search functionality
    $('#searchInput').on('keyup', function() {
        const searchTerm = $(this).val().toLowerCase();
        
        $('.listing-card').each(function() {
            const title = $(this).find('h3').text().toLowerCase();
            const description = $(this).find('p').text().toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                $(this).fadeIn(300);
            } else {
                $(this).fadeOut(300);
            }
        });
    });

    // Sort functionality
    $('#sortSelect').change(function() {
        const sortBy = $(this).val();
        const $listings = $('.listing-card');
        
        $listings.sort(function(a, b) {
            switch(sortBy) {
                case 'price-low':
                    return $(a).data('price') - $(b).data('price');
                case 'price-high':
                    return $(b).data('price') - $(a).data('price');
                case 'rating':
                    return $(b).data('rating') - $(a).data('rating');
                default:
                    return 0;
            }
        });
        
        $('#listingsGrid').html($listings);
    });
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection