@extends('layouts.app')

@section('title', 'Booking Confirmed - BookingHub')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50 flex items-center justify-center py-12 px-4">
    <div class="max-w-2xl w-full">
        <!-- Success Card -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl border border-white/50 p-8 text-center">
            <!-- Success Icon -->
            <div class="w-24 h-24 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-white text-3xl"></i>
            </div>

            <!-- Success Message -->
            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Booking Confirmed!</h1>
            <p class="text-xl text-slate-600 mb-8">Your reservation has been successfully processed</p>

            <!-- Booking Details -->
            <div class="bg-slate-50 rounded-2xl p-6 mb-8 text-left">
                <h3 class="text-lg font-semibold text-slate-800 mb-4 text-center">Booking Details</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Booking ID:</span>
                        <span class="font-semibold text-slate-800">#{{ $booking['id'] ?? '1234' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Date:</span>
                        <span class="font-semibold text-slate-800">{{ date('M d, Y', strtotime($booking['date'] ?? 'today')) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Time:</span>
                        <span class="font-semibold text-slate-800">{{ $booking['time'] ?? '10:00 AM' }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Duration:</span>
                        <span class="font-semibold text-slate-800">{{ $booking['duration'] ?? '2' }} hour(s)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Guests:</span>
                        <span class="font-semibold text-slate-800">{{ $booking['guests'] ?? '2' }} guest(s)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-600">Payment Method:</span>
                        <span class="font-semibold text-slate-800 capitalize">{{ $booking['payment_method'] ?? 'Razorpay' }}</span>
                    </div>
                    <hr class="my-3">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold text-slate-800">Total Paid:</span>
                        <span class="text-lg font-bold text-green-600">{{ $booking['total'] ?? '$330.00' }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Status -->
            <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-8">
                <div class="flex items-center justify-center space-x-3">
                    <i class="fas fa-shield-check text-green-600 text-xl"></i>
                    <span class="text-green-800 font-semibold">Payment Processed Successfully</span>
                </div>
                <p class="text-green-700 text-sm mt-2">Your payment has been securely processed and confirmed</p>
            </div>

            <!-- Next Steps -->
            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mb-8 text-left">
                <h4 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>What's Next?
                </h4>
                <ul class="space-y-2 text-blue-700">
                    <li class="flex items-start">
                        <i class="fas fa-envelope text-blue-500 mr-3 mt-1"></i>
                        <span>You'll receive a confirmation email with all booking details</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone text-blue-500 mr-3 mt-1"></i>
                        <span>The host will contact you 24 hours before your booking</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-calendar-alt text-blue-500 mr-3 mt-1"></i>
                        <span>Add this event to your calendar for easy tracking</span>
                    </li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if(session('user'))
                <a href="{{ route('enduser.bookings') }}" 
                   class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <i class="fas fa-calendar-check mr-2"></i>View My Bookings
                </a>
                @endif
                <a href="{{ route('listings.index') }}" 
                   class="bg-white border-2 border-slate-300 hover:border-indigo-500 text-slate-700 hover:text-indigo-600 px-8 py-4 rounded-xl font-semibold transition-all duration-300">
                    <i class="fas fa-search mr-2"></i>Browse More Listings
                </a>
            </div>

            <!-- Support -->
            <div class="mt-8 pt-6 border-t border-slate-200">
                <p class="text-slate-600 mb-4">Need help with your booking?</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="mailto:support@bookinghub.com" 
                       class="text-indigo-600 hover:text-indigo-700 font-medium">
                        <i class="fas fa-envelope mr-2"></i>support@bookinghub.com
                    </a>
                    <a href="tel:+15551234567" 
                       class="text-indigo-600 hover:text-indigo-700 font-medium">
                        <i class="fas fa-phone mr-2"></i>+1 (555) 123-4567
                    </a>
                </div>
            </div>
        </div>

        <!-- Share Success -->
        <div class="mt-6 text-center">
            <p class="text-slate-600 mb-4">Share your booking experience!</p>
            <div class="flex justify-center space-x-4">
                <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors duration-300">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button class="w-12 h-12 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center transition-colors duration-300">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="w-12 h-12 bg-pink-600 hover:bg-pink-700 text-white rounded-full flex items-center justify-center transition-colors duration-300">
                    <i class="fab fa-instagram"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Auto-scroll to top
    $('html, body').animate({scrollTop: 0}, 'slow');
    
    // Confetti effect (optional)
    setTimeout(function() {
        // Add some celebration animation
        $('body').append('<div class="celebration">🎉</div>');
        $('.celebration').css({
            position: 'fixed',
            top: '50%',
            left: '50%',
            fontSize: '3rem',
            zIndex: 1000,
            animation: 'bounce 1s ease-in-out'
        });
        
        setTimeout(function() {
            $('.celebration').remove();
        }, 2000);
    }, 500);
});
</script>

<style>
@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
    }
    40% {
        transform: translateY(-30px) translateX(-50%);
    }
    60% {
        transform: translateY(-15px) translateX(-50%);
    }
}
</style>
@endsection