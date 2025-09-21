@extends('layouts.app')

@section('title', 'Sign Up - BookingHub')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <!-- Signup Card -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-white/50 p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Join BookingHub</h2>
                <p class="text-slate-600">Create your account and start booking</p>
            </div>

            <!-- Signup Form -->
            <form action="{{ route('signup') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                    <div class="relative">
                        <input type="text" id="name" name="name" required 
                               class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300"
                               placeholder="Enter your full name">
                        <i class="fas fa-user text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300"
                               placeholder="Enter your email">
                        <i class="fas fa-envelope text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required 
                               class="w-full px-4 py-3 pl-12 pr-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300"
                               placeholder="Create a password">
                        <i class="fas fa-lock text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-slate-700 mb-2">Account Type</label>
                    <div class="relative">
                        <select id="role" name="role" required 
                                class="w-full px-4 py-3 pl-12 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 appearance-none bg-white">
                            <option value="">Select account type</option>
                            <option value="EndUser">End User - Browse & Book</option>
                            <option value="Creator">Creator - Create Listings</option>
                        </select>
                        <i class="fas fa-users text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                        <i class="fas fa-chevron-down text-slate-400 absolute right-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-slate-700">
                        I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Terms of Service</a> and 
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-3 px-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-user-plus mr-2"></i>Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-8 pt-6 border-t border-slate-200">
                <p class="text-slate-600">Already have an account? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Sign in here</a>
                </p>
            </div>
        </div>

        <!-- Role Information -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-4 border border-white/50">
                <div class="flex items-center space-x-3 mb-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">End User</h3>
                </div>
                <p class="text-xs text-slate-600">Browse listings, make bookings, and manage your reservations.</p>
            </div>
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-4 border border-white/50">
                <div class="flex items-center space-x-3 mb-2">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-plus text-green-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">Creator</h3>
                </div>
                <p class="text-xs text-slate-600">Create and manage listings, handle bookings, and earn money.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    $('#togglePassword').click(function() {
        const passwordField = $('#password');
        const icon = $(this).find('i');
        
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
</script>
@endsection