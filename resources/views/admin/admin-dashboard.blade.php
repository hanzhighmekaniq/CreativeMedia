<x-LayoutAdmin>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Total Mentors Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="users" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Total Mentors</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalMentors }}</p>
                </div>
            </div>
        </div>

        <!-- Total Visitors Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="user-plus" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Total Visitors</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalVisitors }}</p>
                </div>
            </div>
        </div>

        <!-- Total Articles Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="file-text" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Total Articles</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalArticles }}</p>
                </div>
            </div>
        </div>

        <!-- Total Student Works Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="book" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Student Works</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalStudentWorks }}</p>
                </div>
            </div>
        </div>

        <!-- Total Testimonials Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="star" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Testimonials</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalTestimonials }}</p>
                </div>
            </div>
        </div>

        <!-- Total Comments Card -->
        <div class="rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="flex items-center">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-orange-500/20">
                    <i data-lucide="message-square" class="h-6 w-6 text-orange-500"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-sm font-medium text-gray-400">Total Comments</h2>
                    <p class="text-2xl font-semibold text-white">{{ $totalComments }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Feedback Section -->
    <div class="mt-6">
        <h2 class="text-lg font-medium text-white">Recent Feedback & Suggestions</h2>
        <div class="mt-3 rounded-lg bg-[#1e293b] shadow">
            <ul class="divide-y divide-gray-700">
                @forelse($recentCriticisms as $criticism)
                    <li class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="{{ $criticism->user->img ? asset('storage/' . $criticism->user->img) : asset('images/default-profile.jpg') }}"
                                    alt="{{ $criticism->user->name }}" />
                            </div>
                            <div class="ml-3 flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-white">{{ $criticism->user->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $criticism->created_at->diffForHumans() }}</p>
                                </div>
                                <p class="mt-1 text-sm text-gray-300">{{ $criticism->content }}</p>
                                <div class="mt-2 flex">
                                    <span
                                        class="inline-flex items-center rounded-full bg-gray-900/30 px-2 py-0.5 text-xs font-medium text-gray-400">
                                        {{ ucfirst($criticism->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-4 text-center text-gray-400">No recent feedback</li>
                @endforelse
            </ul>
            <div class="border-t border-gray-700 p-4">
                <a href="" class="text-sm font-medium text-orange-500 hover:text-orange-400">
                    View all feedback
                </a>
            </div>
        </div>
    </div>

    <!-- Activity Chart -->
    <div class="mt-6">
        <h2 class="text-lg font-medium text-white">Monthly Activity</h2>
        <div class="mt-3 rounded-lg bg-[#1e293b] p-4 shadow">
            <div class="h-64 w-full">
                <!-- Chart would go here - using a placeholder -->
                <div class="flex h-full flex-col items-center justify-center">
                    <div class="space-y-2 w-full">
                        <div class="flex items-center justify-between">
                            <div class="w-16 text-xs text-gray-400"></div>
                            <div class="h-2 w-48 rounded-full bg-gray-700">
                                <div class="h-2 rounded-full bg-orange-500" style="width:%">
                                </div>
                            </div>
                            <div class="w-10 text-right text-xs text-gray-400">%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-LayoutAdmin>
