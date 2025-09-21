@extends('layouts.admin')

@section('title', 'Settings - SuperAdmin')
@section('page-title', 'Platform Settings')
@section('page-description', 'Configure platform settings and preferences')

@section('content')
<div class="space-y-6">
    <!-- Settings Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Settings Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
                <h3 class="text-lg font-semibold text-slate-800 mb-4">Settings Categories</h3>
                <nav class="space-y-2">
                    <a href="#general" class="flex items-center space-x-3 px-4 py-3 text-blue-600 bg-blue-50 rounded-lg font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>General Settings</span>
                    </a>
                    <a href="#users" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                        <span>User Management</span>
                    </a>
                    <a href="#payments" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        <span>Payment Settings</span>
                    </a>
                    <a href="#notifications" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM21 12H3m18 0l-3-3m3 3l-3 3"/>
                        </svg>
                        <span>Notifications</span>
                    </a>
                    <a href="#security" class="flex items-center space-x-3 px-4 py-3 text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span>Security</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- General Settings -->
            <div id="general" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
                <h3 class="text-xl font-semibold text-slate-800 mb-6">General Settings</h3>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Platform Name</label>
                            <input type="text" value="PlatformPro" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Admin Email</label>
                            <input type="email" value="admin@platformpro.com" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Platform Description</label>
                        <textarea rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Describe your platform...">Comprehensive SaaS management solution for modern businesses.</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Timezone</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>UTC-8 (Pacific Time)</option>
                                <option>UTC-5 (Eastern Time)</option>
                                <option>UTC+0 (GMT)</option>
                                <option>UTC+1 (Central European Time)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Date Format</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>MM/DD/YYYY</option>
                                <option>DD/MM/YYYY</option>
                                <option>YYYY-MM-DD</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" checked class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-2 text-sm text-slate-700">Enable maintenance mode</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-2 text-sm text-slate-700">Allow user registration</span>
                            </label>
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <!-- User Management Settings -->
            <div id="users" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
                <h3 class="text-xl font-semibold text-slate-800 mb-6">User Management Settings</h3>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Default User Role</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>Basic User</option>
                                <option>Pro User</option>
                                <option>Premium User</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Max Listings Per User</label>
                            <input type="number" value="10" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="text-lg font-medium text-slate-800">User Permissions</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="flex items-center">
                                <input type="checkbox" checked class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-3 text-sm text-slate-700">Users can create listings</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" checked class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-3 text-sm text-slate-700">Users can edit profiles</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-3 text-sm text-slate-700">Auto-approve listings</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" checked class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <span class="ml-3 text-sm text-slate-700">Email verification required</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Settings -->
            <div id="payments" class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
                <h3 class="text-xl font-semibold text-slate-800 mb-6">Payment Settings</h3>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Default Currency</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>USD ($)</option>
                                <option>EUR (€)</option>
                                <option>GBP (£)</option>
                                <option>JPY (¥)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Payment Gateway</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>Stripe</option>
                                <option>PayPal</option>
                                <option>Square</option>
                                <option>Braintree</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="text-lg font-medium text-slate-800">Subscription Plans</h4>
                        <div class="space-y-4">
                            <div class="border border-slate-200 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-slate-800">Basic Plan</h5>
                                        <p class="text-sm text-slate-600">$29/month - Basic features</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</button>
                                        <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-slate-200 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-slate-800">Pro Plan</h5>
                                        <p class="text-sm text-slate-600">$59/month - Advanced features</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</button>
                                        <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-slate-200 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h5 class="font-medium text-slate-800">Premium Plan</h5>
                                        <p class="text-sm text-slate-600">$99/month - All features</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</button>
                                        <button class="text-red-600 hover:text-red-700 text-sm font-medium">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300">
                            Add New Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Settings navigation
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $(this).attr('href');
        
        // Update active state
        $('nav a').removeClass('text-blue-600 bg-blue-50').addClass('text-slate-600');
        $(this).removeClass('text-slate-600').addClass('text-blue-600 bg-blue-50');
        
        // Show target section (in a real app, you'd implement section switching)
        console.log('Navigate to:', target);
    });
});
</script>
@endsection