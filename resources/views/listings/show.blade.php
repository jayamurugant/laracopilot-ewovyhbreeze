@extends('layouts.app')

@section('title', $listing['title'] . ' - BookingHub')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-slate-600 mb-8">
            <a href="{{ route('home') }}" class="hover:text-indigo-600">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('listings.index') }}" class="hover:text-indigo-600">Listings</a>
            <i class="fas fa-chevron-right"></i>
            <span class="text-slate-800">{{ $listing['title'] }}</span>
        </nav>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Listing Details -->
            <div class="lg:col-span-2">
                <!-- Image Gallery -->
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden mb-8">
                    <div class="relative">
                        <img id="mainImage" src="{{ $listing['image'] }}" alt="{{ $listing['title'] }}" 
                             class="w-full h-96 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $listing['category'] }}
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-colors duration-300">
                                <i class="fas fa-heart text-slate-400 hover:text-red-500 text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex space-x-2 overflow-x-auto">
                            @foreach($listing['images'] as $index => $image)
                            <img src="{{ $image }}" alt="Gallery image {{ $index + 1 }}" 
                                 class="w-20 h-20 object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity duration-300 gallery-thumb {{ $index === 0 ? 'ring-2 ring-indigo-500' : '' }}"
                                 onclick="changeMainImage('{{ $image }}', this)">
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Listing Info -->
                <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-2">{{ $listing['title'] }}</h1>
                            <div class="flex items-center space-x-4 text-slate-600">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>{{ $listing['location'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                                    <span class="font-semibold">{{ $listing['rating'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2"></i>
                                    <span>Up to {{ $listing['max_capacity'] }} people</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-slate-800">
                                ${{ $listing['price'] }}<span class="text-lg text-slate-500 font-normal">/hour</span>
                            </div>
                        </div>
                    </div>

                    <div class="prose max-w-none mb-8">
                        <h3 class="text-xl font-semibold text-slate-800 mb-4">Description</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $listing['description'] }}</p>
                    </div>

                    <!-- Amenities -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-slate-800 mb-4">Amenities</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($listing['amenities'] as $amenity)
                            <div class="flex items-center space-x-2 bg-slate-50 rounded-lg p-3">
                                <i class="fas fa-check text-green-500"></i>
                                <span class="text-slate-700">{{ $amenity }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Creator Info -->
                    <div class="border-t border-slate-200 pt-8">
                        <h3 class="text-xl font-semibold text-slate-800 mb-4">Hosted by</h3>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $listing['creator']['avatar'] }}" alt="{{ $listing['creator']['name'] }}" 
                                 class="w-16 h-16 rounded-full">
                            <div class="flex-1">
                                <h4 class="text-lg font-semibold text-slate-800">{{ $listing['creator']['name'] }}</h4>
                                <div class="flex items-center space-x-4 text-slate-600">
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-500 mr-1"></i>
                                        <span>{{ $listing['creator']['rating'] }} rating</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-calendar mr-1"></i>
                                        <span>{{ $listing['creator']['total_bookings'] }} bookings</span>
                                    </div>
                                </div>
                            </div>
                            <button class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg font-medium transition-colors duration-300">
                                <i class="fas fa-envelope mr-2"></i>Contact
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Cancellation Policy -->
                <div class="bg-white rounded-3xl shadow-lg p-8">
                    <h3 class="text-xl font-semibold text-slate-800 mb-4">Cancellation Policy</h3>
                    <p class="text-slate-600">{{ $listing['cancellation_policy'] }}</p>
                </div>
            </div>

            <!-- Right Column - Booking Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 p-6 sticky top-8">
                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-slate-800 mb-2">
                            ${{ $listing['price'] }}<span class="text-lg text-slate-500 font-normal">/hour</span>
                        </div>
                        <p class="text-slate-600">Select date and time to book</p>
                    </div>

                    <!-- Calendar -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Select Date</label>
                        <input type="date" id="bookingDate" 
                               class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               min="{{ date('Y-m-d') }}">
                    </div>

                    <!-- Time Slots -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Available Times</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($listing['available_times'] as $time)
                            <button class="time-slot px-3 py-2 border border-slate-300 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition-colors duration-300"
                                    data-time="{{ $time }}">
                                {{ $time }}
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Duration (hours)</label>
                        <select id="duration" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="1">1 hour</option>
                            <option value="2">2 hours</option>
                            <option value="3">3 hours</option>
                            <option value="4">4 hours</option>
                            <option value="6">6 hours</option>
                            <option value="8">8 hours</option>
                        </select>
                    </div>

                    <!-- Guests -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Number of Guests</label>
                        <div class="flex items-center justify-between border border-slate-300 rounded-xl px-4 py-3">
                            <span>Guests</span>
                            <div class="flex items-center space-x-3">
                                <button type="button" id="decreaseGuests" class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:border-indigo-500 transition-colors duration-300">
                                    <i class="fas fa-minus text-sm"></i>
                                </button>
                                <span id="guestCount" class="w-8 text-center">1</span>
                                <button type="button" id="increaseGuests" class="w-8 h-8 rounded-full border border-slate-300 flex items-center justify-center hover:border-indigo-500 transition-colors duration-300">
                                    <i class="fas fa-plus text-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Total Calculation -->
                    <div class="bg-slate-50 rounded-xl p-4 mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-600">Base price × <span id="selectedHours">1</span> hour(s)</span>
                            <span class="text-slate-800" id="baseTotal">${{ $listing['price'] }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-600">Service fee</span>
                            <span class="text-slate-800" id="serviceFee">${{ number_format($listing['price'] * 0.1, 2) }}</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between items-center font-semibold text-lg">
                            <span class="text-slate-800">Total</span>
                            <span class="text-slate-800" id="totalPrice">${{ number_format($listing['price'] * 1.1, 2) }}</span>
                        </div>
                    </div>

                    <!-- Book Button -->
                    @if(session('user'))
                        @if(session('user.role') === 'EndUser')
                        <button id="bookNowBtn" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-calendar-check mr-2"></i>Book Now
                        </button>
                        @else
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-center">
                            <i class="fas fa-info-circle text-yellow-600 mb-2"></i>
                            <p class="text-yellow-800 text-sm">Only End Users can make bookings</p>
                        </div>
                        @endif
                    @else
                    <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login to Book
                    </a>
                    @endif

                    <!-- Quick Contact -->
                    <div class="mt-4 pt-4 border-t border-slate-200">
                        <p class="text-sm text-slate-600 text-center mb-3">Have questions?</p>
                        <button class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 py-3 rounded-xl font-medium transition-colors duration-300">
                            <i class="fas fa-comments mr-2"></i>Message Host
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Listings -->
        @if(count($relatedListings) > 0)
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-slate-800 mb-8 text-center">Similar Listings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedListings as $related)
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">{{ $related['title'] }}</h3>
                        <p class="text-slate-600 text-sm mb-4">{{ Str::limit($related['description'], 100) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-slate-800">${{ $related['price'] }}/hr</span>
                            <a href="{{ route('listings.show', $related['id']) }}" 
                               class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300">
                                View
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Booking Modal -->
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-6">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-credit-card text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">Complete Your Booking</h3>
            <p class="text-slate-600">Choose your payment method</p>
        </div>

        <div class="space-y-4 mb-6">
            <!-- Booking Summary -->
            <div class="bg-slate-50 rounded-xl p-4">
                <h4 class="font-semibold text-slate-800 mb-2">Booking Summary</h4>
                <div class="space-y-1 text-sm text-slate-600">
                    <div class="flex justify-between">
                        <span>Date:</span>
                        <span id="summaryDate">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Time:</span>
                        <span id="summaryTime">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Duration:</span>
                        <span id="summaryDuration">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Guests:</span>
                        <span id="summaryGuests">-</span>
                    </div>
                    <div class="flex justify-between font-semibold text-slate-800 pt-2 border-t">
                        <span>Total:</span>
                        <span id="summaryTotal">-</span>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div>
                <h4 class="font-semibold text-slate-800 mb-3">Payment Method</h4>
                <div class="space-y-2">
                    <label class="flex items-center p-3 border border-slate-200 rounded-xl hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="paymentMethod" value="razorpay" class="mr-3" checked>
                        <img src="https://razorpay.com/assets/razorpay-logo.svg" alt="Razorpay" class="h-6 mr-3">
                        <span class="font-medium">Razorpay</span>
                    </label>
                    <label class="flex items-center p-3 border border-slate-200 rounded-xl hover:bg-slate-50 cursor-pointer">
                        <input type="radio" name="paymentMethod" value="stripe" class="mr-3">
                        <div class="w-12 h-6 bg-indigo-600 rounded flex items-center justify-center mr-3">
                            <span class="text-white text-xs font-bold">stripe</span>
                        </div>
                        <span class="font-medium">Stripe</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex space-x-3">
            <button id="cancelBooking" class="flex-1 bg-slate-200 hover:bg-slate-300 text-slate-700 py-3 rounded-xl font-semibold transition-colors duration-300">
                Cancel
            </button>
            <button id="confirmBooking" class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300">
                <i class="fas fa-lock mr-2"></i>Pay & Book
            </button>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let selectedTime = '';
    let guestCount = 1;
    const basePrice = {{ $listing['price'] }};
    const maxGuests = {{ $listing['max_capacity'] }};

    // Image gallery
    window.changeMainImage = function(imageSrc, thumb) {
        $('#mainImage').attr('src', imageSrc);
        $('.gallery-thumb').removeClass('ring-2 ring-indigo-500');
        $(thumb).addClass('ring-2 ring-indigo-500');
    };

    // Time slot selection
    $('.time-slot').click(function() {
        $('.time-slot').removeClass('bg-indigo-600 text-white border-indigo-600').addClass('border-slate-300');
        $(this).addClass('bg-indigo-600 text-white border-indigo-600').removeClass('border-slate-300');
        selectedTime = $(this).data('time');
        updateBookButton();
    });

    // Guest counter
    $('#increaseGuests').click(function() {
        if (guestCount < maxGuests) {
            guestCount++;
            $('#guestCount').text(guestCount);
        }
    });

    $('#decreaseGuests').click(function() {
        if (guestCount > 1) {
            guestCount--;
            $('#guestCount').text(guestCount);
        }
    });

    // Duration change
    $('#duration').change(function() {
        updatePricing();
    });

    // Update pricing
    function updatePricing() {
        const duration = parseInt($('#duration').val());
        const baseTotal = basePrice * duration;
        const serviceFee = baseTotal * 0.1;
        const total = baseTotal + serviceFee;

        $('#selectedHours').text(duration);
        $('#baseTotal').text('$' + baseTotal.toFixed(2));
        $('#serviceFee').text('$' + serviceFee.toFixed(2));
        $('#totalPrice').text('$' + total.toFixed(2));
    }

    // Update book button state
    function updateBookButton() {
        const date = $('#bookingDate').val();
        const hasRequiredFields = date && selectedTime;
        
        $('#bookNowBtn').prop('disabled', !hasRequiredFields);
        
        if (hasRequiredFields) {
            $('#bookNowBtn').removeClass('opacity-50 cursor-not-allowed');
        } else {
            $('#bookNowBtn').addClass('opacity-50 cursor-not-allowed');
        }
    }

    // Date change
    $('#bookingDate').change(updateBookButton);

    // Book now button
    $('#bookNowBtn').click(function() {
        if ($(this).prop('disabled')) return;

        const date = $('#bookingDate').val();
        const duration = $('#duration').val();
        const total = $('#totalPrice').text();

        // Update modal summary
        $('#summaryDate').text(new Date(date).toLocaleDateString());
        $('#summaryTime').text(selectedTime);
        $('#summaryDuration').text(duration + ' hour(s)');
        $('#summaryGuests').text(guestCount + ' guest(s)');
        $('#summaryTotal').text(total);

        $('#bookingModal').removeClass('hidden').addClass('flex');
    });

    // Modal controls
    $('#cancelBooking').click(function() {
        $('#bookingModal').removeClass('flex').addClass('hidden');
    });

    $('#confirmBooking').click(function() {
        const paymentMethod = $('input[name="paymentMethod"]:checked').val();
        
        // Simulate payment processing
        $(this).html('<i class="fas fa-spinner fa-spin mr-2"></i>Processing...');
        
        setTimeout(function() {
            // Redirect to success page with booking details
            const bookingData = {
                listing_id: {{ $listing['id'] }},
                date: $('#bookingDate').val(),
                time: selectedTime,
                duration: $('#duration').val(),
                guests: guestCount,
                payment_method: paymentMethod,
                total: $('#totalPrice').text()
            };
            
            // In a real app, this would make an AJAX call to store the booking
            localStorage.setItem('lastBooking', JSON.stringify(bookingData));
            window.location.href = '{{ route("bookings.success") }}';
        }, 2000);
    });

    // Initialize
    updatePricing();
    updateBookButton();

    // Set minimum date to today
    $('#bookingDate').attr('min', new Date().toISOString().split('T')[0]);
});
</script>
@endsection