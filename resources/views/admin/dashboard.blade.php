@extends('layouts.master')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
        <p class="text-gray-600">Welcome back, John! Here's what's happening with your blog today.</p>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <i class="fas fa-newspaper text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Articles</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">42</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <i class="fas fa-arrow-up text-xs"></i> 12% from last month
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <i class="fas fa-eye text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Views</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">5,248</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <i class="fas fa-arrow-up text-xs"></i> 24% from last month
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <i class="fas fa-comments text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">Comments</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">128</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <i class="fas fa-arrow-up text-xs"></i> 8% from last month
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <i class="fas fa-thumbs-up text-white text-xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">Likes</dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">842</div>
                            <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
                                <i class="fas fa-arrow-down text-xs"></i> 3% from last month
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent + Quick Stats --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Recent Articles</h3>
            </div>
            <div class="divide-y divide-gray-200">
                {{-- ... keep your three sample items here unchanged ... --}}
                {{-- You can later loop through real posts --}}
            </div>
            <div class="px-4 py-4 sm:px-6 border-t border-gray-200 bg-gray-50 text-right">
                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">View all articles</a>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Quick Stats</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                {{-- ... keep your Top Categories / Popular Tags / Recent Comments blocks ... --}}
            </div>
        </div>
    </div>

    {{-- Traffic + Performance --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Traffic Sources</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                {{-- ... placeholder chart ... --}}
            </div>
        </div>
        
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Metrics</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                {{-- ... placeholder chart ... --}}
            </div>
        </div>
    </div>
@endsection
