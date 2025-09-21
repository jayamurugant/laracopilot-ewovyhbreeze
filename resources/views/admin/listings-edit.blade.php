@extends('layouts.admin')

@section('title', 'Edit Listing')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Edit Listing</h1>
            <p class="text-slate-600">Update listing information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('listings.show', $listing['id']) }}" target="_blank" class="bg-green-100 hover:bg-green-200 text-green-700 px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Preview
            </a>
            <a href="{{ route('admin.listings') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Listings
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <form class="p-8 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Listing Title *</label>
                    <input type="text" value="{{ $listing['title'] }}" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Price *</label>
                    <input type="text" value="{{ $listing['price'] }}" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Category Selection -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Category *</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="categorySelect">
                        @foreach($categories as $category => $subcategories)
                            <option value="{{ strtolower(str_replace(' ', '-', $category)) }}" {{ $listing['category'] === $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subcategory</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="subcategorySelect">
                        <option value="{{ strtolower(str_replace(' ', '-', $listing['subcategory'])) }}" selected>{{ $listing['subcategory'] }}</option>
                    </select>
                </div>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Location *</label>
                <input type="text" value="{{ $listing['location'] }}" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description *</label>
                <textarea rows="6" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none">{{ $listing['description'] }}</textarea>
            </div>

            <!-- Current Images -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Current Images</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=200" alt="Image 1" class="w-full h-32 object-cover rounded-lg">
                        <button type="button" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    <div class="relative group">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=200" alt="Image 2" class="w-full h-32 object-cover rounded-lg">
                        <button type="button" class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Add New Images -->
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-blue-400 transition-colors duration-300">
                    <svg class="w-8 h-8 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <p class="text-slate-600 text-sm">Add more images</p>
                    <input type="file" class="hidden" multiple accept="image/*">
                </div>
            </div>

            <!-- Additional Options -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="active" {{ $listing['status'] === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="pending" {{ $listing['status'] === 'pending' ? 'selected' : '' }}>Pending Review</option>
                        <option value="draft" {{ $listing['status'] === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="expired" {{ $listing['status'] === 'expired' ? 'selected' : '' }}>Expired</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Expiry Date</label>
                    <input type="date" value="2024-04-15" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex items-center space-x-3 pt-8">
                    <input type="checkbox" id="featured" {{ $listing['featured'] ? 'checked' : '' }} class="w-5 h-5 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="featured" class="text-sm font-medium text-slate-700">Mark as Featured</label>
                </div>
            </div>

            <!-- Tags -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tags</label>
                <div class="flex flex-wrap gap-2 mb-3">
                    @foreach($listing['tags'] as $tag)
                    <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                        {{ $tag }}
                        <button type="button" class="ml-2 text-blue-600 hover:text-blue-800">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </span>
                    @endforeach
                </div>
                <input type="text" placeholder="Add tags (press Enter)" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Listing Performance -->
            <div class="border-t border-slate-200 pt-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Listing Performance</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-blue-50 rounded-xl p-4 text-center">
                        <div class="text-2xl font-bold text-blue-600">245</div>
                        <div class="text-sm text-slate-600">Total Views</div>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4 text-center">
                        <div class="text-2xl font-bold text-green-600">12</div>
                        <div class="text-sm text-slate-600">Inquiries</div>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-4 text-center">
                        <div class="text-2xl font-bold text-orange-600">8</div>
                        <div class="text-sm text-slate-600">Favorites</div>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-4 text-center">
                        <div class="text-2xl font-bold text-purple-600">3.2%</div>
                        <div class="text-sm text-slate-600">Conversion</div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <div class="flex space-x-3">
                    <button type="button" class="bg-red-100 hover:bg-red-200 text-red-700 px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete Listing
                    </button>
                </div>
                <div class="flex space-x-3">
                    <button type="button" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-8 py-3 rounded-xl font-semibold transition-all duration-300">
                        Cancel
                    </button>
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                        Update Listing
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Category and subcategory handling
const categories = @json($categories);
const categorySelect = document.getElementById('categorySelect');
const subcategorySelect = document.getElementById('subcategorySelect');

categorySelect.addEventListener('change', function() {
    const selectedCategory = this.value;
    const currentSubcategory = subcategorySelect.value;
    subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
    
    if (selectedCategory) {
        // Find the category name from the value
        const categoryName = Object.keys(categories).find(cat => 
            cat.toLowerCase().replace(' ', '-') === selectedCategory
        );
        
        if (categoryName && categories[categoryName]) {
            categories[categoryName].forEach(subcategory => {
                const option = document.createElement('option');
                option.value = subcategory.toLowerCase().replace(' ', '-');
                option.textContent = subcategory;
                if (option.value === currentSubcategory) {
                    option.selected = true;
                }
                subcategorySelect.appendChild(option);
            });
        }
    }
});

// Initialize subcategories on page load
window.addEventListener('DOMContentLoaded', function() {
    categorySelect.dispatchEvent(new Event('change'));
});
</script>
@endsection