@extends('layouts.app')

@section('title', 'Register')

@section('content')
<main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="auth-container max-w-md w-full space-y-6 p-10 bg-white rounded-xl shadow-lg">

        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900">Create your account</h2>
            <p class="mt-2 text-gray-600">Join our tech community today</p>
        </div>

        {{-- Success message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 p-2 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Signup Form -->
        <form action="{{ route('register.submit') }}" class="mt-6 space-y-5" id="signupForm" method="POST">
            @csrf
            <!-- Name Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="name">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input autocomplete="name" 
                           class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                           id="name" 
                           name="name" 
                           placeholder="John Doe" 
                           required 
                           type="text" 
                           value="{{ old('name') }}"/>
                </div>
            </div>

            <!-- Email Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input autocomplete="email"
                           class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                           id="email" 
                           name="email" 
                           placeholder="you@example.com" 
                           required 
                           type="email"
                           value="{{ old('email') }}"/>
                </div>
                <p class="mt-1 text-xs text-gray-500">We'll never share your email with anyone else.</p>
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input autocomplete="new-password" 
                           class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                           id="password" 
                           name="password" 
                           placeholder="••••••••" 
                           required 
                           type="password"/>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button class="text-gray-400 hover:text-gray-500 focus:outline-none" id="togglePassword" type="button">
                            <i class="fas fa-eye-slash" id="passwordIcon"></i>
                        </button>
                    </div>
                </div>
                <!-- Password Strength Meter -->
                <div class="mt-2 grid grid-cols-4 gap-1">
                    <div class="password-strength bg-gray-200 rounded-sm" id="strength-1"></div>
                    <div class="password-strength bg-gray-200 rounded-sm" id="strength-2"></div>
                    <div class="password-strength bg-gray-200 rounded-sm" id="strength-3"></div>
                    <div class="password-strength bg-gray-200 rounded-sm" id="strength-4"></div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Use 8 or more characters with a mix of letters, numbers & symbols.</p>
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="password_confirmation">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input autocomplete="new-password" 
                           class="input-focus pl-10 block w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none"
                           id="password_confirmation" 
                           name="password_confirmation" 
                           placeholder="••••••••" 
                           required 
                           type="password"/>
                </div>
            </div>

            <!-- Terms Agreement -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" id="terms" name="terms" required type="checkbox"/>
                </div>
                <div class="ml-3 text-sm">
                    <label class="font-medium text-gray-700" for="terms">
                        I agree to the 
                        <a class="text-blue-600 hover:text-blue-500" href="#">Terms of Service</a> and 
                        <a class="text-blue-600 hover:text-blue-500" href="#">Privacy Policy</a>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition" type="submit">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-blue-300 group-hover:text-blue-200"></i>
                    </span>
                    Create Account
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a class="font-medium text-blue-600 hover:text-blue-500" href="/login">Sign in</a>
            </p>
        </div>
    </div>
</main>
@endsection