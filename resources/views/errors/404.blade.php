@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- 404 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
        </div>

        <!-- Error Content -->
        <h1 class="text-4xl md:text-6xl font-bold text-slate-800 mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-slate-600 mb-6">Page Not Found</h2>
        <p class="text-lg text-slate-500 mb-8 leading-relaxed">
            Sorry, the page you are looking for doesn't exist or has been moved. 
            Let's get you back to exploring amazing listings!
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-home mr-2"></i>Go Home
            </a>
            <a href="{{ route('listings.index') }}" class="inline-flex items-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-search mr-2"></i>Browse Listings
            </a>
        </div>

        <!-- Search Box -->
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" placeholder="Search our platform..." class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <i class="fas fa-search text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
            </div>
        </div>
    </div>
</div>
@endsection