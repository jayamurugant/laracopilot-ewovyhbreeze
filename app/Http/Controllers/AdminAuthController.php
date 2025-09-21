<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'admin@business.com' => 'admin123',
            'manager@business.com' => 'manager123',
            'supervisor@business.com' => 'supervisor123'
        ];

        $email = $request->input('email');
        $password = $request->input('password');

        if (isset($credentials[$email]) && $credentials[$email] === $password) {
            session([
                'admin_logged_in' => true,
                'admin_user' => [
                    'email' => $email,
                    'name' => ucfirst(explode('@', $email)[0]),
                    'role' => $email === 'admin@business.com' ? 'Administrator' : 'Manager'
                ]
            ]);

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}