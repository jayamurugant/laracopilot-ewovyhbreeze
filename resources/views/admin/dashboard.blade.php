@extends('layouts.admin')

@section('title', 'SuperAdmin Dashboard - PlatformPro')
@section('page-title', 'SuperAdmin Dashboard')
@section('page-description', 'Complete platform overview and management')

@section('content')
<div class="space-y-6">
    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Users -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Users</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($data['stats']['total_users']) }}</p>
                    <p class="text-sm text-emerald-600 mt-1">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            +12.5% from last month
                        </span>
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Users -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Active Users</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($data['stats']['active_users']) }}</p>
                    <p class="text-sm text-emerald-600 mt-1">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            +8.2% this week
                        </span>
                    </p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Revenue</p>
                    <p class="text-3xl font-bold text-slate-800">${{ number_format($data['stats']['total_revenue'], 0) }}</p>
                    <p class="text-sm text-emerald-600 mt-1">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            +15.8% this month
                        </span>
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Listings -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Listings</p>
                    <p class="text-3xl font-bold text-slate-800">{{ number_format($data['stats']['total_listings']) }}</p>
                    <p class="text-sm text-orange-600 mt-1">
                        <span class="inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9"/>
                            </svg>
                            {{ $data['stats']['pending_listings'] }} pending review
                        </span>
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Revenue Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">Revenue Analytics</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="revenueChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-slate-500 mt-4">*Fixed dimensions optimized for desktop viewing</p>
        </div>

        <!-- User Growth Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-800 mb-4">User Growth Trends</h3>
            <div class="w-full overflow-x-auto">
                <div style="width: 600px; height: 300px; min-width: 600px;">
                    <canvas id="userChart" width="600" height="300"></canvas>
                </div>
            </div>
            <p class="text-sm text-slate-500 mt-4">*Scroll horizontally on smaller screens</p>
        </div>
    </div>

    <!-- Recent Activity Tables -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Recent Users -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Recent Users</h3>
                    <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($data['recent_users'] as $user)
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">{{ strtoupper(substr($user['name'], 0, 2)) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-900 truncate">{{ $user['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $user['email'] }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $user['status'] === 'Active' ? 'bg-green-100 text-green-800' : 
                                   ($user['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $user['status'] }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Listings -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Recent Listings</h3>
                    <a href="{{ route('admin.listings') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($data['recent_listings'] as $listing)
                    <div class="border-l-4 {{ $listing['status'] === 'Published' ? 'border-green-400' : ($listing['status'] === 'Pending Review' ? 'border-yellow-400' : 'border-slate-400') }} pl-4">
                        <p class="text-sm font-medium text-slate-900">{{ $listing['title'] }}</p>
                        <p class="text-xs text-slate-500">by {{ $listing['user'] }}</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $listing['status'] === 'Published' ? 'bg-green-100 text-green-800' : 
                                   ($listing['status'] === 'Pending Review' ? 'bg-yellow-100 text-yellow-800' : 'bg-slate-100 text-slate-800') }}">
                                {{ $listing['status'] }}
                            </span>
                            <span class="text-xs text-slate-500">{{ $listing['views'] }} views</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Payments -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
            <div class="p-6 border-b border-slate-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-800">Recent Payments</h3>
                    <a href="{{ route('admin.payments') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All</a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($data['recent_payments'] as $payment)
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-900">${{ number_format($payment['amount'], 2) }}</p>
                            <p class="text-xs text-slate-500">{{ $payment['user'] }}</p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                {{ $payment['status'] === 'Completed' ? 'bg-green-100 text-green-800' : 
                                   ($payment['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $payment['status'] }}
                            </span>
                            <p class="text-xs text-slate-500 mt-1">{{ $payment['date'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Monthly Revenue',
                data: [15000, 18000, 22000, 25000, 28000, 32000, 35000, 38000, 42000, 45000, 48000, 52000],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + (value / 1000) + 'K';
                        }
                    }
                }
            }
        }
    });

    // User Growth Chart
    const userCtx = document.getElementById('userChart').getContext('2d');
    new Chart(userCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Users',
                data: [450, 520, 680, 750, 890, 920, 1100, 1250, 1350, 1450, 1580, 1650],
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                borderColor: 'rgb(16, 185, 129)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection