<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    private $listings = [
        [
            'id' => 1,
            'title' => 'Luxury Photography Studio',
            'description' => 'Professional photography studio with state-of-the-art equipment including professional lighting, backdrops, and high-end cameras. Perfect for portraits, product photography, and creative shoots.',
            'price' => 150,
            'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&h=600&fit=crop',
            'images' => [
                'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1551818255-e6e10975cd17?w=800&h=600&fit=crop'
            ],
            'rating' => 4.9,
            'location' => 'Downtown, New York',
            'category' => 'Photography',
            'creator' => [
                'name' => 'John Creator',
                'avatar' => 'https://ui-avatars.com/api/?name=John+Creator&background=059669&color=fff',
                'rating' => 4.8,
                'total_bookings' => 156
            ],
            'amenities' => ['Professional Lighting', 'Backdrop Options', 'High-End Equipment', 'Editing Software', 'Parking Available'],
            'available_times' => ['09:00', '12:00', '15:00', '18:00'],
            'max_capacity' => 8,
            'cancellation_policy' => 'Free cancellation up to 24 hours before booking'
        ],
        [
            'id' => 2,
            'title' => 'Modern Event Hall',
            'description' => 'Spacious event hall perfect for weddings, corporate events, and celebrations. Features modern amenities, professional sound system, and customizable lighting.',
            'price' => 500,
            'image' => 'https://images.unsplash.com/photo-1464207687429-7505649dae38?w=800&h=600&fit=crop',
            'images' => [
                'https://images.unsplash.com/photo-1464207687429-7505649dae38?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1519167758481-83f29c853cb9?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=800&h=600&fit=crop'
            ],
            'rating' => 4.8,
            'location' => 'Midtown, New York',
            'category' => 'Events',
            'creator' => [
                'name' => 'Mike Smith',
                'avatar' => 'https://ui-avatars.com/api/?name=Mike+Smith&background=7c3aed&color=fff',
                'rating' => 4.9,
                'total_bookings' => 89
            ],
            'amenities' => ['Sound System', 'LED Lighting', 'Catering Kitchen', 'Parking', 'WiFi', 'A/C'],
            'available_times' => ['10:00', '14:00', '18:00'],
            'max_capacity' => 200,
            'cancellation_policy' => 'Free cancellation up to 48 hours before booking'
        ],
        [
            'id' => 3,
            'title' => 'Cozy Meeting Room',
            'description' => 'Perfect for small business meetings and presentations. Equipped with modern technology, comfortable seating, and professional atmosphere.',
            'price' => 75,
            'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
            'images' => [
                'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1560472355-536de3962603?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1541746972996-4e0b0f93e586?w=800&h=600&fit=crop'
            ],
            'rating' => 4.7,
            'location' => 'Business District, NYC',
            'category' => 'Meeting',
            'creator' => [
                'name' => 'Sarah Johnson',
                'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=ea580c&color=fff',
                'rating' => 4.6,
                'total_bookings' => 234
            ],
            'amenities' => ['Projector', 'Whiteboard', 'WiFi', 'Coffee Machine', 'Comfortable Seating'],
            'available_times' => ['08:00', '10:00', '13:00', '15:00', '17:00'],
            'max_capacity' => 12,
            'cancellation_policy' => 'Free cancellation up to 12 hours before booking'
        ],
        [
            'id' => 4,
            'title' => 'Art Workshop Studio',
            'description' => 'Creative space for art workshops, painting classes, and creative sessions. Natural lighting and all necessary supplies included.',
            'price' => 120,
            'image' => 'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?w=800&h=600&fit=crop',
            'images' => [
                'https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?w=800&h=600&fit=crop',
                'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop'
            ],
            'rating' => 4.6,
            'location' => 'Arts District, NYC',
            'category' => 'Workshop',
            'creator' => [
                'name' => 'Emma Artist',
                'avatar' => 'https://ui-avatars.com/api/?name=Emma+Artist&background=f59e0b&color=fff',
                'rating' => 4.7,
                'total_bookings' => 67
            ],
            'amenities' => ['Art Supplies', 'Natural Light', 'Easels', 'Sink Access', 'Storage'],
            'available_times' => ['09:00', '13:00', '16:00'],
            'max_capacity' => 15,
            'cancellation_policy' => 'Free cancellation up to 24 hours before booking'
        ]
    ];

    public function index()
    {
        $categories = ['All', 'Photography', 'Events', 'Meeting', 'Workshop'];
        return view('listings.index', compact('categories'))->with('listings', $this->listings);
    }

    public function show($id)
    {
        $listing = collect($this->listings)->firstWhere('id', (int)$id);
        
        if (!$listing) {
            abort(404);
        }

        $relatedListings = collect($this->listings)
            ->where('category', $listing['category'])
            ->where('id', '!=', $listing['id'])
            ->take(3)
            ->values()
            ->toArray();

        return view('listings.show', compact('listing', 'relatedListings'));
    }
}