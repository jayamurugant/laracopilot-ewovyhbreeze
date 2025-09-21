<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ListingHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-purple-50 min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Admin Login</h1>
                <p class="text-slate-600">Access the ListingHub admin panel</p>
            </div>

            <!-- Login Form -->
            <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl border border-white/50 p-8">
                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-red-700 text-sm font-medium">{{ $errors->first() }}</p>
                    </div>
                </div>
                @endif

                <form method="POST" action="/admin/login" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Enter your email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Sign In to Admin Panel
                    </button>
                </form>

                <!-- Demo Credentials -->
                <div class="mt-8 p-6 bg-slate-50 rounded-2xl border border-slate-200">
                    <h3 class="text-sm font-semibold text-slate-800 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                        Demo Admin Credentials
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                            <div>
                                <div class="font-medium text-slate-800">Administrator</div>
                                <div class="text-slate-600">admin@business.com</div>
                            </div>
                            <div class="text-slate-500 font-mono">admin123</div>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                            <div>
                                <div class="font-medium text-slate-800">Manager</div>
                                <div class="text-slate-600">manager@business.com</div>
                            </div>
                            <div class="text-slate-500 font-mono">manager123</div>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200">
                            <div>
                                <div class="font-medium text-slate-800">Supervisor</div>
                                <div class="text-slate-600">supervisor@business.com</div>
                            </div>
                            <div class="text-slate-500 font-mono">supervisor123</div>
                        </div>
                    </div>
                </div>

                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="/" class="text-slate-600 hover:text-blue-600 text-sm font-medium transition-colors duration-300">
                        ← Back to Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>