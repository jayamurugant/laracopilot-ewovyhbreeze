<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function index(Request $request)
    {
        // Static listings data for demonstration
        $listings = [
            [
                'id' => 1,
                'title' => 'Luxury Downtown Apartment',
                'description' => 'Beautiful 2-bedroom apartment in the heart of downtown with modern amenities and stunning city views.',
                'price' => '$2,500/month',
                'category' => 'Real Estate',
                'location' => 'Downtown District',
                'image' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400',
                'featured' => true,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => '1,200 sq ft',
                'posted_date' => '2024-01-15',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'title' => 'Senior Software Developer',
                'description' => 'Join our innovative tech team as a Senior Software Developer. Remote-friendly position with excellent benefits.',
                'price' => '$95,000 - $120,000',
                'category' => 'Jobs',
                'location' => 'Remote / San Francisco',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400',
                'featured' => true,
                'company' => 'TechCorp Inc.',
                'type' => 'Full-time',
                'experience' => '5+ years',
                'posted_date' => '2024-01-18',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'title' => 'Vintage MacBook Pro 2019',
                'description' => 'Excellent condition MacBook Pro 16-inch, perfect for professionals and creators. Includes original accessories.',
                'price' => '$1,899',
                'category' => 'Electronics',
                'location' => 'Tech District',
                'image' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=400',
                'featured' => false,
                'condition' => 'Excellent',
                'brand' => 'Apple',
                'warranty' => '6 months',
                'posted_date' => '2024-01-20',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'title' => 'Professional Web Design Services',
                'description' => 'Custom web design and development services for businesses. Modern, responsive designs that convert.',
                'price' => 'Starting at $2,999',
                'category' => 'Services',
                'location' => 'Nationwide',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400',
                'featured' => true,
                'service_type' => 'Web Development',
                'delivery_time' => '2-4 weeks',
                'rating' => '4.9/5',
                'posted_date' => '2024-01-22',
                'status' => 'active'
            ],
            [
                'id' => 5,
                'title' => 'Cozy Family Home',
                'description' => 'Beautiful 3-bedroom family home in quiet neighborhood with large backyard and modern kitchen.',
                'price' => '$3,200/month',
                'category' => 'Real Estate',
                'location' => 'Suburban Heights',
                'image' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=400',
                'featured' => false,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => '1,800 sq ft',
                'posted_date' => '2024-01-25',
                'status' => 'active'
            ],
            [
                'id' => 6,
                'title' => 'Marketing Manager Position',
                'description' => 'Exciting opportunity for an experienced Marketing Manager to lead our growing marketing team.',
                'price' => '$75,000 - $90,000',
                'category' => 'Jobs',
                'location' => 'New York, NY',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400',
                'featured' => false,
                'company' => 'Growth Solutions LLC',
                'type' => 'Full-time',
                'experience' => '3+ years',
                'posted_date' => '2024-01-28',
                'status' => 'active'
            ]
        ];

        // Filter by category if specified
        $category = $request->get('category');
        if ($category) {
            $listings = array_filter($listings, function($listing) use ($category) {
                return strtolower($listing['category']) === strtolower($category);
            });
        }

        // Filter by search term
        $search = $request->get('search');
        if ($search) {
            $listings = array_filter($listings, function($listing) use ($search) {
                return stripos($listing['title'], $search) !== false || 
                       stripos($listing['description'], $search) !== false;
            });
        }

        $categories = ['Real Estate', 'Jobs', 'Electronics', 'Services', 'Automotive', 'Fashion'];
        $featuredListings = array_filter($listings, function($listing) {
            return $listing['featured'] === true;
        });

        return view('listings.index', compact('listings', 'categories', 'featuredListings', 'category', 'search'));
    }

    public function show($id)
    {
        // Static listing data for demonstration
        $listings = [
            1 => [
                'id' => 1,
                'title' => 'Luxury Downtown Apartment',
                'description' => 'Beautiful 2-bedroom apartment in the heart of downtown with modern amenities and stunning city views. This exceptional property features floor-to-ceiling windows, hardwood floors, stainless steel appliances, and access to premium building amenities including a fitness center, rooftop terrace, and 24/7 concierge service.',
                'price' => '$2,500/month',
                'category' => 'Real Estate',
                'location' => 'Downtown District',
                'images' => [
                    'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=800',
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=800',
                    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800'
                ],
                'featured' => true,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => '1,200 sq ft',
                'posted_date' => '2024-01-15',
                'status' => 'active',
                'contact' => [
                    'name' => 'Sarah Johnson',
                    'phone' => '+1 (555) 123-4567',
                    'email' => 'sarah@realestate.com'
                ],
                'amenities' => ['Parking', 'Gym', 'Pool', 'Concierge', 'Pet Friendly'],
                'map_coordinates' => ['lat' => 40.7128, 'lng' => -74.0060]
            ],
            2 => [
                'id' => 2,
                'title' => 'Senior Software Developer',
                'description' => 'Join our innovative tech team as a Senior Software Developer. We are looking for a passionate developer with experience in modern web technologies. This remote-friendly position offers excellent benefits, professional development opportunities, and the chance to work on cutting-edge projects that impact millions of users worldwide.',
                'price' => '$95,000 - $120,000',
                'category' => 'Jobs',
                'location' => 'Remote / San Francisco',
                'images' => [
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800',
                    'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800'
                ],
                'featured' => true,
                'company' => 'TechCorp Inc.',
                'type' => 'Full-time',
                'experience' => '5+ years',
                'posted_date' => '2024-01-18',
                'status' => 'active',
                'contact' => [
                    'name' => 'HR Department',
                    'phone' => '+1 (555) 987-6543',
                    'email' => 'careers@techcorp.com'
                ],
                'requirements' => ['React/Vue.js', 'Node.js', 'Python', 'AWS', 'Git'],
                'benefits' => ['Health Insurance', 'Remote Work', '401k', 'Flexible Hours', 'Professional Development']
            ]
        ];

        $listing = $listings[$id] ?? null;
        
        if (!$listing) {
            abort(404);
        }

        // Related listings
        $relatedListings = array_filter($listings, function($item) use ($listing) {
            return $item['category'] === $listing['category'] && $item['id'] !== $listing['id'];
        });

        return view('listings.show', compact('listing', 'relatedListings'));
    }

    public function category($category)
    {
        return $this->index(request()->merge(['category' => $category]));
    }
}