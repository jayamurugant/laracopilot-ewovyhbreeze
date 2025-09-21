<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'hero' => [
                'title' => 'Your Ultimate Platform Solution',
                'subtitle' => 'Streamline your business operations with our comprehensive SaaS platform',
                'cta_primary' => 'Start Free Trial',
                'cta_secondary' => 'View Features'
            ],
            'features' => [
                [
                    'title' => 'User Management',
                    'description' => 'Comprehensive user management system with role-based access control and detailed analytics.',
                    'icon' => 'users'
                ],
                [
                    'title' => 'Listing Management',
                    'description' => 'Powerful listing management tools with approval workflows and performance tracking.',
                    'icon' => 'list'
                ],
                [
                    'title' => 'Payment Processing',
                    'description' => 'Secure payment processing with detailed transaction tracking and revenue analytics.',
                    'icon' => 'credit-card'
                ],
                [
                    'title' => 'Advanced Analytics',
                    'description' => 'Real-time analytics and reporting to help you make data-driven business decisions.',
                    'icon' => 'chart'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Johnson',
                    'role' => 'CEO, TechStart',
                    'content' => 'This platform has transformed how we manage our operations. The admin dashboard is incredibly powerful.',
                    'rating' => 5
                ],
                [
                    'name' => 'Mike Chen',
                    'role' => 'Operations Manager',
                    'content' => 'The user management features are exactly what we needed. Highly recommend this solution.',
                    'rating' => 5
                ]
            ]
        ];

        return view('welcome', compact('data'));
    }
}