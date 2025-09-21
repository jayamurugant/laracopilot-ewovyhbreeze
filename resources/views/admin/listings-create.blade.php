@extends('layouts.admin')

@section('title', 'Create New Listing')

@section('content')
<div class="p-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">Create New Listing</h1>
            <p class="text-slate-600">Add a new listing to the platform</p>
        </div>
        <a href="{{ route('admin.listings') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-lg font-semibold transition-all duration-300">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Listings
        </a>
    </div>

    <!-- Create Form -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <form class="p-8 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Listing Title *</label>
                    <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter listing title">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Price *</label>
                    <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="$0.00">
                </div>
            </div>

            <!-- Category Selection -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Category *</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="categorySelect">
                        <option value="">Select Category</option>
                        @foreach($categories as $category => $subcategories)
                            <option value="{{ strtolower(str_replace(' ', '-', $category)) }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subcategory</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="subcategorySelect" disabled>
                        <option value="">Select Subcategory</option>
                    </select>
                </div>
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Location *</label>
                <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Enter location">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description *</label>
                <textarea rows="6" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" placeholder="Provide detailed description of your listing..."></textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Images</label>
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:border-blue-400 transition-colors duration-300">
                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-slate-600 mb-2">Drag and drop images here, or click to browse</p>
                    <p class="text-sm text-slate-500">PNG, JPG, GIF up to 10MB each</p>
                    <input type="file" class="hidden" multiple accept="image/*">
                </div>
            </div>

            <!-- Additional Options -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                    <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="active">Active</option>
                        <option value="pending">Pending Review</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Expiry Date</label>
                    <input type="date" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex items-center space-x-3 pt-8">
                    <input type="checkbox" id="featured" class="w-5 h-5 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="featured" class="text-sm font-medium text-slate-700">Mark as Featured</label>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="border-t border-slate-200 pt-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Contact Information</h3>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Contact Name *</label>
                        <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                        <input type="email" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="email@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Phone</label>
                        <input type="tel" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="+1 (555) 123-4567">
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-slate-200">
                <button type="button" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-8 py-3 rounded-xl font-semibold transition-all duration-300">
                    Save as Draft
                </button>
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    Create Listing
                </button>
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
    subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
    
    if (selectedCategory) {
        // Find the category name from the value
        const categoryName = Object.keys(categories).find(cat => 
            strtolower(str_replace(' ', '-', cat)) === selectedCategory
        );
        
        if (categoryName && categories[categoryName]) {
            categories[categoryName].forEach(subcategory => {
                const option = document.createElement('option');
                option.value = subcategory.toLowerCase().replace(' ', '-');
                option.textContent = subcategory;
                subcategorySelect.appendChild(option);
            });
            subcategorySelect.disabled = false;
        }
    } else {
        subcategorySelect.disabled = true;
    }
});

// Helper function to match PHP's str_replace and strtolower
function strtolower(str) {
    return str.toLowerCase();
}

function str_replace(search, replace, subject) {
    return subject.split(search).join(replace);
}
</script>
@endsection