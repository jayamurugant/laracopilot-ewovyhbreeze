@extends('layouts.app')

@section('title', $listing['title'])

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <div class="flex items-center space-x-2 text-gray-500">
                <a href="/" class="hover:text-purple-600 transition-colors duration-300">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('listings.index') }}" class="hover:text-purple-600 transition-colors duration-300">Listings</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('listings.category', strtolower(str_replace(' ', '-', $listing['category']))) }}" class="hover:text-purple-600 transition-colors duration-300">{{ $listing['category'] }}</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-800 font-medium">{{ Str::limit($listing['title'], 30) }}</span>
            </div>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Image Gallery -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden mb-8">
                    <div class="relative">
                        <img src="{{ $listing['images'][0] }}" alt="{{ $listing['title'] }}" class="w-full h-96 object-cover" id="mainImage">
                        @if($listing['featured'])
                        <div class="absolute top-6 left-6">
                            <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-full font-semibold">Featured</span>
                        </div>
                        @endif
                        <div class="absolute top-6 right-6">
                            <span class="bg-white/90 backdrop-blur-sm text-gray-800 px-4 py-2 rounded-full font-semibold">{{ $listing['category'] }}</span>
                        </div>
                    </div>
                    
                    @if(count($listing['images']) > 1)
                    <div class="p-4">
                        <div class="flex space-x-2 overflow-x-auto">
                            @foreach($listing['images'] as $index => $image)
                            <img src="{{ $image }}" alt="Image {{ $index + 1 }}" class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity duration-300 flex-shrink-0" onclick="changeMainImage('{{ $image }}')">
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Listing Details -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-8">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $listing['title'] }}</h1>
                            <div class="flex items-center space-x-4 text-gray-600">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $listing['location'] }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0a2 2 0 00-2 2v10a2 2 0 002 2h6a2 2 0 002-2V9a2 2 0 00-2-2"/>
                                    </svg>
                                    Posted {{ date('M d, Y', strtotime($listing['posted_date'])) }}
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold text-purple-600 mb-2">{{ $listing['price'] }}</div>
                            <div class="text-sm text-gray-500">{{ $listing['category'] }}</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Description</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $listing['description'] }}</p>
                    </div>

                    <!-- Property/Job/Product Specific Details -->
                    @if($listing['category'] === 'Real Estate')
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-purple-50 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold text-purple-600">{{ $listing['bedrooms'] }}</div>
                            <div class="text-sm text-gray-600">Bedrooms</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $listing['bathrooms'] }}</div>
                            <div class="text-sm text-gray-600">Bathrooms</div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $listing['area'] }}</div>
                            <div class="text-sm text-gray-600">Area</div>
                        </div>
                        <div class="bg-orange-50 rounded-xl p-4 text-center">
                            <div class="text-2xl font-bold text-orange-600">{{ $listing['status'] === 'active' ? 'Available' : 'Unavailable' }}</div>
                            <div class="text-sm text-gray-600">Status</div>
                        </div>
                    </div>

                    @if(isset($listing['amenities']))
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Amenities</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($listing['amenities'] as $amenity)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $amenity }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif

                    @if($listing['category'] === 'Jobs')
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-purple-50 rounded-xl p-4">
                            <div class="text-sm text-gray-600 mb-1">Company</div>
                            <div class="font-semibold text-gray-800">{{ $listing['company'] }}</div>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-4">
                            <div class="text-sm text-gray-600 mb-1">Job Type</div>
                            <div class="font-semibold text-gray-800">{{ $listing['type'] }}</div>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4">
                            <div class="text-sm text-gray-600 mb-1">Experience</div>
                            <div class="font-semibold text-gray-800">{{ $listing['experience'] }}</div>
                        </div>
                    </div>

                    @if(isset($listing['requirements']))
                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Requirements</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($listing['requirements'] as $req)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">{{ $req }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(isset($listing['benefits']))
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Benefits</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($listing['benefits'] as $benefit)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">{{ $benefit }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif

                    <!-- Share Buttons -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Share this listing</h3>
                        <div class="flex space-x-3">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                                Twitter
                            </button>
                            <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </button>
                            <button class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                </svg>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Card -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 sticky top-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Contact Seller</h3>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800">{{ $listing['contact']['name'] }}</div>
                                <div class="text-sm text-gray-600">Verified Seller</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 mb-6">
                        <a href="tel:{{ $listing['contact']['phone'] }}" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 text-center block">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Call Now
                        </a>
                        <a href="mailto:{{ $listing['contact']['email'] }}" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 text-center block">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Send Email
                        </a>
                        <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-3 rounded-xl font-semibold transition-all duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Send Message
                        </button>
                    </div>

                    <div class="text-center text-sm text-gray-500">
                        <p>Response time: Usually within 2 hours</p>
                    </div>
                </div>

                <!-- Safety Tips -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-3xl border border-yellow-200 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Safety Tips</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Meet in a public place for transactions
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Never send money in advance
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Inspect items before purchasing
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Trust your instincts
                        </li>
                    </ul>
                </div>

                <!-- Report Listing -->
                <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Report This Listing</h3>
                    <p class="text-sm text-gray-600 mb-4">Help us keep our platform safe by reporting suspicious or inappropriate listings.</p>
                    <button class="w-full bg-red-50 hover:bg-red-100 text-red-600 py-3 rounded-xl font-semibold transition-all duration-300 border border-red-200">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        Report Listing
                    </button>
                </div>
            </div>
        </div>

        <!-- Related Listings -->
        @if(count($relatedListings) > 0)
        <section class="mt-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Similar Listings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach(array_slice($relatedListings, 0, 4) as $related)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="{{ $related['images'][0] ?? $related['image'] }}" alt="{{ $related['title'] }}" class="w-full h-48 object-cover">
                        @if($related['featured'])
                        <div class="absolute top-3 left-3">
                            <span class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-2 py-1 rounded-full text-xs font-semibold">Featured</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 mb-2 line-clamp-1">{{ $related['title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($related['description'], 80) }}</p>
                        
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-lg font-bold text-purple-600">{{ $related['price'] }}</span>
                        </div>
                        
                        <a href="{{ route('listings.show', $related['id']) }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-2 rounded-lg font-semibold transition-all duration-300 text-center block text-sm">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>

<script>
function changeMainImage(imageSrc) {
    document.getElementById('mainImage').src = imageSrc;
}
</script>
@endsection