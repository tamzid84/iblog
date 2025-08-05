@extends('layouts.app')

@section('title', 'Login')

@section('content')
<main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
<div class="auth-container max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg">
    {{-- Success Message --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

{{-- Validation or Login Errors --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-300 text-red-700 p-2 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="text-center">
<div class="flex justify-center mb-4">
<i class="fas fa-user-circle text-5xl text-blue-600"></i>
</div>
<h2 class="text-3xl font-bold text-gray-900">Welcome back</h2>
<p class="mt-2 text-gray-600">Sign in to access your account</p>
</div>
<!-- Login Form -->
<form action="{{ route('login.submit') }}" class="mt-8 space-y-6" method="POST">
    @csrf
<div class="rounded-md shadow-sm space-y-4">
<!-- Email Input -->
<div>
<label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email address</label>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<i class="fas fa-envelope text-gray-400"></i>
</div>
<input autocomplete="email" class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none" id="email" name="email" placeholder="you@example.com" required="" type="email"/>
</div>
</div>
<!-- Password Input -->
<div>
<div class="flex justify-between items-center mb-1">
<label class="block text-sm font-medium text-gray-700" for="password">Password</label>
<a class="text-sm text-blue-600 hover:text-blue-500" href="#">Forgot password?</a>
</div>
<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<i class="fas fa-lock text-gray-400"></i>
</div>
<input autocomplete="current-password" class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<div class="absolute inset-y-0 right-0 pr-3 flex items-center">
<button class="text-gray-400 hover:text-gray-500 focus:outline-none" id="togglePassword" type="button">
<i class="fas fa-eye-slash" id="passwordIcon"></i>
</button>
</div>
</div>
</div>
</div>
<!-- Remember Me Checkbox -->
<div class="flex items-center">
<input class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="remember-me" name="remember-me" type="checkbox"/>
<label class="ml-2 block text-sm text-gray-700" for="remember-me">Remember me</label>
</div>
<!-- Submit Button -->
<div>
<button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition" type="submit">
<span class="absolute left-0 inset-y-0 flex items-center pl-3">
<i class="fas fa-sign-in-alt text-blue-300 group-hover:text-blue-200"></i>
</span>
                        Sign in
                    </button>
</div>
</form>
<!-- Social Login -->
<div class="mt-6">
<div class="relative">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-gray-300"></div>
</div>
<div class="relative flex justify-center text-sm">
<span class="px-2 bg-white text-gray-500">Or continue with</span>
</div>
</div>
<div class="mt-6 grid grid-cols-3 gap-3">
<div>
<a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" href="#">
<i class="fab fa-google text-red-500"></i>
</a>
</div>
<div>
<a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" href="#">
<i class="fab fa-github text-gray-800"></i>
</a>
</div>
<div>
<a class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50" href="#">
<i class="fab fa-twitter text-blue-400"></i>
</a>
</div>
</div>
</div>
<!-- Sign Up Link -->
<div class="mt-6 text-center">
<p class="text-sm text-gray-600">
                    Don't have an account?
                    <a class="font-medium text-blue-600 hover:text-blue-500" href="/register">Sign up</a>
</p>
</div>
</div>
</main>

@endsection
