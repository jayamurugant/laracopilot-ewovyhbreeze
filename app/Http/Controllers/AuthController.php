<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Static user data for demonstration
    private $users = [
        [
            'id' => 1,
            'name' => 'Super Administrator',
            'email' => 'superadmin@platform.com',
            'password' => 'superadmin123',
            'role' => 'SuperAdmin',
            'avatar' => 'https://ui-avatars.com/api/?name=Super+Administrator&background=6366f1&color=fff'
        ],
        [
            'id' => 2,
            'name' => 'John Creator',
            'email' => 'creator@platform.com',
            'password' => 'creator123',
            'role' => 'Creator',
            'avatar' => 'https://ui-avatars.com/api/?name=John+Creator&background=059669&color=fff'
        ],
        [
            'id' => 3,
            'name' => 'Jane EndUser',
            'email' => 'enduser@platform.com',
            'password' => 'enduser123',
            'role' => 'EndUser',
            'avatar' => 'https://ui-avatars.com/api/?name=Jane+EndUser&background=dc2626&color=fff'
        ],
        [
            'id' => 4,
            'name' => 'Mike Smith',
            'email' => 'mike@platform.com',
            'password' => 'mike123',
            'role' => 'Creator',
            'avatar' => 'https://ui-avatars.com/api/?name=Mike+Smith&background=7c3aed&color=fff'
        ],
        [
            'id' => 5,
            'name' => 'Sarah Johnson',
            'email' => 'sarah@platform.com',
            'password' => 'sarah123',
            'role' => 'EndUser',
            'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=ea580c&color=fff'
        ]
    ];

    public function showLogin()
    {
        if (session('user')) {
            return $this->redirectByRole(session('user.role'));
        }
        return view('auth.login');
    }

    public function showSignup()
    {
        if (session('user')) {
            return $this->redirectByRole(session('user.role'));
        }
        return view('auth.signup');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        foreach ($this->users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session(['user' => $user]);
                return $this->redirectByRole($user['role']);
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function signup(Request $request)
    {
        // In a real app, this would save to database
        $newUser = [
            'id' => count($this->users) + 1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'avatar' => 'https://ui-avatars.com/api/?name=' . urlencode($request->name) . '&background=6366f1&color=fff'
        ];

        session(['user' => $newUser]);
        return $this->redirectByRole($newUser['role']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('home');
    }

    private function redirectByRole($role)
    {
        switch ($role) {
            case 'SuperAdmin':
                return redirect()->route('superadmin.dashboard');
            case 'Creator':
                return redirect()->route('creator.dashboard');
            case 'EndUser':
                return redirect()->route('enduser.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}