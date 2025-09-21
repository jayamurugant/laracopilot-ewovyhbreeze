<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredListings = [
            [
                'id' => 1,
                'title' => 'Luxury Photography Studio',
                'description' => 'Professional photography studio with state-of-the-art equipment',
                'price' => 150,
                'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&h=300&fit=crop',
                'rating' => 4.9,
                'location' => 'Downtown, New York',
                'category' => 'Photography'
            ],
            [
                'id' => 2,
                'title' => 'Modern Event Hall',
                'description' => 'Spacious event hall perfect for weddings and corporate events',
                'price' => 500,
                'image' => 'https://images.unsplash.com/photo-1464207687429-7505649dae38?w=500&h=300&fit=crop',
                'rating' => 4.8,
                'location' => 'Midtown, New York',
                'category' => 'Events'
            ],
            [
                'id' => 3,
                'title' => 'Cozy Meeting Room',
                'description' => 'Perfect for small business meetings and presentations',
                'price' => 75,
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=500&h=300&fit=crop',
                'rating' => 4.7,
                'location' => 'Business District, NYC',
                'category' => 'Meeting'
            ]
        ];

        $stats = [
            'total_listings' => 1250,
            'total_bookings' => 8500,
            'happy_customers' => 5600,
            'cities' => 45
        ];

        return view('welcome', compact('featuredListings', 'stats'));
    }
}