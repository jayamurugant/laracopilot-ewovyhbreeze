<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Simple session check
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
    }

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $stats = [
            'total_listings' => 156,
            'active_listings' => 142,
            'pending_listings' => 8,
            'expired_listings' => 6,
            'total_users' => 1247,
            'new_users_today' => 23,
            'total_revenue' => '$45,280',
            'monthly_growth' => '+12.5%'
        ];

        $recentListings = [
            ['id' => 1, 'title' => 'Luxury Downtown Apartment', 'status' => 'active', 'price' => '$2,500', 'date' => '2024-01-15'],
            ['id' => 2, 'title' => 'Senior Software Developer', 'status' => 'active', 'price' => '$95,000', 'date' => '2024-01-18'],
            ['id' => 3, 'title' => 'Vintage MacBook Pro 2019', 'status' => 'pending', 'price' => '$1,899', 'date' => '2024-01-20'],
            ['id' => 4, 'title' => 'Professional Web Design Services', 'status' => 'active', 'price' => '$2,999', 'date' => '2024-01-22'],
        ];

        $chartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'listings' => [45, 52, 48, 61, 55, 67],
            'revenue' => [12500, 15800, 13200, 18900, 16400, 21300]
        ];

        return view('admin.dashboard', compact('stats', 'recentListings', 'chartData'));
    }

    public function listings()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $listings = [
            [
                'id' => 1,
                'title' => 'Luxury Downtown Apartment',
                'category' => 'Real Estate',
                'price' => '$2,500/month',
                'status' => 'active',
                'views' => 245,
                'inquiries' => 12,
                'posted_date' => '2024-01-15',
                'expires_date' => '2024-04-15',
                'user' => 'Sarah Johnson'
            ],
            [
                'id' => 2,
                'title' => 'Senior Software Developer',
                'category' => 'Jobs',
                'price' => '$95,000 - $120,000',
                'status' => 'active',
                'views' => 189,
                'inquiries' => 28,
                'posted_date' => '2024-01-18',
                'expires_date' => '2024-03-18',
                'user' => 'TechCorp Inc.'
            ],
            [
                'id' => 3,
                'title' => 'Vintage MacBook Pro 2019',
                'category' => 'Electronics',
                'price' => '$1,899',
                'status' => 'pending',
                'views' => 67,
                'inquiries' => 5,
                'posted_date' => '2024-01-20',
                'expires_date' => '2024-02-20',
                'user' => 'Mike Chen'
            ],
            [
                'id' => 4,
                'title' => 'Professional Web Design Services',
                'category' => 'Services',
                'price' => 'Starting at $2,999',
                'status' => 'active',
                'views' => 156,
                'inquiries' => 18,
                'posted_date' => '2024-01-22',
                'expires_date' => '2024-07-22',
                'user' => 'Design Studio Pro'
            ],
            [
                'id' => 5,
                'title' => 'Cozy Family Home',
                'category' => 'Real Estate',
                'price' => '$3,200/month',
                'status' => 'expired',
                'views' => 298,
                'inquiries' => 22,
                'posted_date' => '2023-12-25',
                'expires_date' => '2024-01-25',
                'user' => 'Property Management Co.'
            ]
        ];

        $stats = [
            'total' => count($listings),
            'active' => count(array_filter($listings, fn($l) => $l['status'] === 'active')),
            'pending' => count(array_filter($listings, fn($l) => $l['status'] === 'pending')),
            'expired' => count(array_filter($listings, fn($l) => $l['status'] === 'expired'))
        ];

        return view('admin.listings', compact('listings', 'stats'));
    }

    public function createListing()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $categories = [
            'Real Estate' => ['Apartments', 'Houses', 'Commercial', 'Land'],
            'Jobs' => ['Technology', 'Marketing', 'Sales', 'Healthcare', 'Education'],
            'Electronics' => ['Computers', 'Phones', 'Gaming', 'Audio'],
            'Services' => ['Web Design', 'Consulting', 'Repair', 'Cleaning'],
            'Automotive' => ['Cars', 'Motorcycles', 'Parts', 'Services'],
            'Fashion' => ['Clothing', 'Accessories', 'Shoes', 'Jewelry']
        ];

        return view('admin.listings-create', compact('categories'));
    }

    public function editListing($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Sample listing data for editing
        $listing = [
            'id' => $id,
            'title' => 'Luxury Downtown Apartment',
            'description' => 'Beautiful 2-bedroom apartment in the heart of downtown with modern amenities and stunning city views.',
            'price' => '2500',
            'category' => 'Real Estate',
            'subcategory' => 'Apartments',
            'location' => 'Downtown District',
            'status' => 'active',
            'featured' => true,
            'tags' => ['luxury', 'downtown', 'modern', 'city-view']
        ];

        $categories = [
            'Real Estate' => ['Apartments', 'Houses', 'Commercial', 'Land'],
            'Jobs' => ['Technology', 'Marketing', 'Sales', 'Healthcare', 'Education'],
            'Electronics' => ['Computers', 'Phones', 'Gaming', 'Audio'],
            'Services' => ['Web Design', 'Consulting', 'Repair', 'Cleaning'],
            'Automotive' => ['Cars', 'Motorcycles', 'Parts', 'Services'],
            'Fashion' => ['Clothing', 'Accessories', 'Shoes', 'Jewelry']
        ];

        return view('admin.listings-edit', compact('listing', 'categories'));
    }

    public function categories()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $categories = [
            [
                'id' => 1,
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'description' => 'Properties for rent and sale',
                'listings_count' => 45,
                'icon' => 'home',
                'status' => 'active',
                'created_date' => '2024-01-01'
            ],
            [
                'id' => 2,
                'name' => 'Jobs',
                'slug' => 'jobs',
                'description' => 'Employment opportunities',
                'listings_count' => 32,
                'icon' => 'briefcase',
                'status' => 'active',
                'created_date' => '2024-01-01'
            ],
            [
                'id' => 3,
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Technology and gadgets',
                'listings_count' => 28,
                'icon' => 'laptop',
                'status' => 'active',
                'created_date' => '2024-01-01'
            ],
            [
                'id' => 4,
                'name' => 'Services',
                'slug' => 'services',
                'description' => 'Professional services',
                'listings_count' => 21,
                'icon' => 'tools',
                'status' => 'active',
                'created_date' => '2024-01-01'
            ],
            [
                'id' => 5,
                'name' => 'Automotive',
                'slug' => 'automotive',
                'description' => 'Vehicles and auto services',
                'listings_count' => 18,
                'icon' => 'car',
                'status' => 'active',
                'created_date' => '2024-01-05'
            ],
            [
                'id' => 6,
                'name' => 'Fashion',
                'slug' => 'fashion',
                'description' => 'Clothing and accessories',
                'listings_count' => 12,
                'icon' => 'shirt',
                'status' => 'draft',
                'created_date' => '2024-01-10'
            ]
        ];

        return view('admin.categories', compact('categories'));
    }

    public function users()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.users');
    }

    public function analytics()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.analytics');
    }

    public function settings()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        return view('admin.settings');
    }
}