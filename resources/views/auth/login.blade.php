@extends('layouts.app')

@section('title', 'Login - BookingHub')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-white/50 p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Welcome Back</h2>
                <p class="text-slate-600">Sign in to your BookingHub account</p>
            </div>

            <!-- Demo Credentials -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-4 mb-6 border border-blue-200">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">Demo Accounts:</h3>
                <div class="text-xs text-blue-700 space-y-1">
                    <p><strong>SuperAdmin:</strong> superadmin@platform.com | superadmin123</p>
                    <p><strong>Creator:</strong> creator@platform.com | creator123</p>
                    <p><strong>EndUser:</strong> enduser@platform.com | enduser123</p>
                </div>
            </div>

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
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
                               placeholder="Enter your password">
                        <i class="fas fa-lock text-slate-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-slate-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-slate-700">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium">Forgot password?</a>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-3 px-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                </button>
            </form>

            <!-- Sign Up Link -->
            <div class="text-center mt-8 pt-6 border-t border-slate-200">
                <p class="text-slate-600">Don't have an account? 
                    <a href="{{ route('signup') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">Sign up here</a>
                </p>
            </div>
        </div>

        <!-- Quick Access Buttons -->
        <div class="mt-6 grid grid-cols-3 gap-3">
            <button onclick="fillCredentials('superadmin@platform.com', 'superadmin123')" 
                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-300">
                SuperAdmin
            </button>
            <button onclick="fillCredentials('creator@platform.com', 'creator123')" 
                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-300">
                Creator
            </button>
            <button onclick="fillCredentials('enduser@platform.com', 'enduser123')" 
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-3 rounded-lg text-xs font-medium transition-colors duration-300">
                EndUser
            </button>
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

    // Fill credentials function
    function fillCredentials(email, password) {
        $('#email').val(email);
        $('#password').val(password);
    }
</script>
@endsection