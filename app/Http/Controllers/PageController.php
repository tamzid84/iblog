<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Category;    

class PageController extends Controller
{
    // Show pages
  

    
    public function categories() { return view('categories'); }
    public function profile() { return view('profile'); }
    public function login() { return view('login'); }
    public function registerPage() { return view('register'); }
    public function singleBlog() { return view('single-blog'); }

    public function welcome() { return view('welcome'); }
    
    // Handle login form
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Demo credentials
        $demoEmail = 'demo@example.com';
        $demoPassword = 'password123';
        $demoName = 'John Doe';

        if ($request->email === $demoEmail && $request->password === $demoPassword) {
            // Store user in session
            session(['user' => $demoName]);
            return redirect('admin/dashboard')->with('success', 'Login successfully!');
        } else {
            return back()->withErrors([
                'email' => 'Invalid credentials. Try demo@example.com / password123'
            ]);
        }
    }
    // Handle logout
    public function logout()
    {
        Session::forget('user');
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    // Handle registration form
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Example: store user if model exists
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        return back()->with('success', 'Registration successful!');
    }



}


