@extends('layouts.app')

@section('title', 'welcome')

@section('content')
<div class="max-w-xl mx-auto mt-12 bg-white shadow-md p-6 rounded-lg text-center">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('user'))
        <h2 class="text-2xl font-bold mb-4">Welcome, {{ session('user') }}!</h2>
        <p class="text-gray-600 mb-6">You are now logged in.</p>
        <a href="{{ route('logout') }}" 
           class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
           Sign Out
        </a>
    @else
        <h2 class="text-2xl font-bold mb-4">You are not logged in.</h2>
        <a href="/login" class="text-blue-600 hover:underline">Go to Login</a>
    @endif
</div>
@endsection