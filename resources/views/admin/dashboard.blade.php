@extends('layouts.admin')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Total Users Card -->
            <div class="flex items-center justify-center h-24 rounded bg-white dark:bg-gray-800">
                <div class="text-center">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <i class="fas fa-users"></i>
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $totalUsers ?? 0 }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Users</p>
                </div>
            </div>

            <!-- Total Articles Card -->
            <div class="flex items-center justify-center h-24 rounded bg-white dark:bg-gray-800">
                <div class="text-center">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <i class="fas fa-newspaper"></i>
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $totalArticles ?? 0 }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Articles</p>
                </div>
            </div>

            <!-- Total Categories Card -->
            <div class="flex items-center justify-center h-24 rounded bg-white dark:bg-gray-800">
                <div class="text-center">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <i class="fas fa-folder"></i>
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $totalCategories ?? 0 }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Categories</p>
                </div>
            </div>

            <!-- Total Comments Card -->
            <div class="flex items-center justify-center h-24 rounded bg-white dark:bg-gray-800">
                <div class="text-center">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <i class="fas fa-comments"></i>
                    </p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $totalComments ?? 0 }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Comments</p>
                </div>
            </div>
        </div>

        <!-- Recent Articles Section -->
        <div class="mb-4">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Recent Articles</h2>
            @if(isset($recentArticles) && $recentArticles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentArticles as $article)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                {{ $article->title }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ Str::limit($article->content, 100) }}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                <span>By {{ $article->user->name ?? 'Unknown' }}</span>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400">No recent articles found</p>
                </div>
            @endif
        </div>

        <!-- Recent Comments Section -->
        <div class="mb-4">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Recent Comments</h2>
            @if(isset($recentComments) && $recentComments->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentComments as $comment)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                {{ Str::limit($comment->content, 100) }}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 dark:text-gray-400">
                                <span>By {{ $comment->user->name ?? 'Unknown' }}</span>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400">No recent comments found</p>
                </div>
            @endif
        </div>

        <!-- Recent Users Section -->
        <div>
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Recent Users</h2>
            @if(isset($recentUsers) && $recentUsers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentUsers as $user)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                            <div class="flex items-center space-x-3">
                                <img class="w-10 h-10 rounded-full object-cover"
                                    src="{{ $user->img ? asset('storage/' . $user->img) : asset('images/default-profile.jpg') }}"
                                    alt="{{ $user->name }}">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Joined {{ $user->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center">
                    <p class="text-gray-500 dark:text-gray-400">No recent users found</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 