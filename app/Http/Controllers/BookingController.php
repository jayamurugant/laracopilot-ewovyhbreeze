<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // In a real application, this would validate and store the booking
        $bookingData = [
            'id' => rand(1000, 9999),
            'listing_id' => $request->listing_id,
            'user_id' => session('user.id'),
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'guests' => $request->guests,
            'payment_method' => $request->payment_method,
            'total' => $request->total,
            'status' => 'confirmed',
            'created_at' => now()
        ];

        // Store in session for demo purposes
        session(['last_booking' => $bookingData]);

        return redirect()->route('bookings.success');
    }

    public function success()
    {
        $booking = session('last_booking');
        
        if (!$booking) {
            return redirect()->route('home');
        }

        // Sample booking data if none exists
        if (!$booking) {
            $booking = [
                'id' => 1234,
                'listing_title' => 'Luxury Photography Studio',
                'date' => date('Y-m-d'),
                'time' => '10:00',
                'duration' => 2,
                'guests' => 2,
                'total' => '$330.00',
                'payment_method' => 'razorpay',
                'status' => 'confirmed'
            ];
        }

        return view('bookings.success', compact('booking'));
    }
}