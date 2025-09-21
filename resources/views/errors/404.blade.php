@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- 404 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-6">
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
            Let's get you back to PlatformPro!
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="/" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Go Home
            </a>
            <a href="{{ route('admin.login') }}" class="inline-flex items-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Admin Panel
            </a>
        </div>

        <!-- Quick Links -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-white/50">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Quick Navigation</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="/#features" class="text-slate-600 hover:text-blue-600 transition-colors duration-300">Platform Features</a>
                <a href="/#about" class="text-slate-600 hover:text-blue-600 transition-colors duration-300">About Us</a>
                <a href="/#contact" class="text-slate-600 hover:text-blue-600 transition-colors duration-300">Contact</a>
                <a href="{{ route('admin.login') }}" class="text-slate-600 hover:text-blue-600 transition-colors duration-300">Admin Access</a>
            </div>
        </div>
    </div>
</div>
@endsection