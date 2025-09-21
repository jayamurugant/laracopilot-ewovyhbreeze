@extends('layouts.app')

@section('title', '500 - Server Error')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-orange-50 flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- 500 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-r from-red-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-exclamation-triangle text-white text-4xl"></i>
            </div>
        </div>

        <!-- Error Content -->
        <h1 class="text-4xl md:text-6xl font-bold text-slate-800 mb-4">500</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-slate-600 mb-6">Internal Server Error</h2>
        <p class="text-lg text-slate-500 mb-8 leading-relaxed">
            Something went wrong on our end. We're working to fix this issue. 
            Please try again in a few moments.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <button onclick="location.reload()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-orange-600 hover:from-red-600 hover:to-orange-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-redo mr-2"></i>Try Again
            </button>
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-home mr-2"></i>Go Home
            </a>
        </div>

        <!-- Contact Support -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-white/50">
            <h3 class="text-lg font-semibold text-slate-800 mb-2">Need immediate help?</h3>
            <p class="text-slate-600 mb-4">Contact our support team if this problem persists.</p>
            <a href="mailto:support@bookinghub.com" class="text-red-600 hover:text-red-700 font-medium">support@bookinghub.com</a>
        </div>
    </div>
</div>
@endsection