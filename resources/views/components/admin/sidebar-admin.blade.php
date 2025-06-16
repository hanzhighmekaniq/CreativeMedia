<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#1e293b] border-r border-[#1e293b] sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-[#1e293b]">
        <ul class="space-y-2 font-medium text-white">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 7h2v5H9V7zm0 6h2v2H9v-2z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 group {{ request()->routeIs('admin.mentors.*') || request()->routeIs('admin.visitors.*') || request()->routeIs('admin.skills.*') ? 'text-orange-500' : '' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.mentors.*') || request()->routeIs('admin.visitors.*') || request()->routeIs('admin.skills.*') ? 'text-orange-500' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap {{ request()->routeIs('admin.mentors.*', 'admin.visitors.*', 'admin.skills.*') ? 'text-orange-400' : '' }}">User</span>
                    <svg class="w-3 h-3 group-hover:text-white" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example"
                    class="py-2 space-y-2 {{ request()->routeIs('admin.mentors.*') || request()->routeIs('admin.visitors.*') || request()->routeIs('admin.skills.*') ? 'block' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.mentors.index') }}"
                            class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 {{ request()->routeIs('admin.mentors.*') ? 'bg-orange-500 text-white' : '' }}">Mentor</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.visitors.index') }}"
                            class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 {{ request()->routeIs('admin.visitors.*') ? 'bg-orange-500 text-white' : '' }}">Visitor</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.skills.index') }}"
                            class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 {{ request()->routeIs('admin.skills.*') ? 'bg-orange-500 text-white' : '' }}">Skills</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-white rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 group {{ request()->routeIs('admin.categories.*') || request()->routeIs('admin.subcategories.*') ? 'text-orange-500' : '' }}"
                    aria-controls="dropdown-program" data-collapse-toggle="dropdown-program">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.categories.*') || request()->routeIs('admin.subcategories.*') ? 'text-orange-500' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M4 3a1 1 0 00-1 1v2a1 1 0 001 1h1v9a1 1 0 102 0V7h1v9a1 1 0 102 0V7h1v9a1 1 0 102 0V7h1v9a1 1 0 102 0V7h1a1 1 0 001-1V4a1 1 0 00-1-1H4z" />
                    </svg>
                    <span
                        class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap {{ request()->routeIs('admin.categories.*') || request()->routeIs('admin.subcategories.*') ? 'text-orange-400' : 'text-gray-400' }}">Program
                        Type</span>
                    <svg class="w-3 h-3 group-hover:text-white" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-program"
                    class="py-2 space-y-2 {{ request()->routeIs('admin.categories.*') || request()->routeIs('admin.subcategories.*') ? 'block' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 {{ request()->routeIs('admin.categories.*') ? 'bg-orange-500 text-white' : '' }}">Category</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.subcategories.index') }}"
                            class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-orange-500 hover:text-white transition duration-75 {{ request()->routeIs('admin.subcategories.*') ? 'bg-orange-500 text-white' : '' }}">Sub
                            Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.articles.index') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.articles.*') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.articles.*') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h16v2H4zm0 4h10v2H4zm0 4h16v2H4zm0 4h10v2H4z" />
                    </svg>
                    <span class="ms-3">Article</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.student-works.index') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.student-works.*') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.student-works.*') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L2 9l10 6 10-6-10-6zm0 7l-6-3.6v7.2L12 17l6-3.6V6.4L12 10z" />
                    </svg>
                    <span class="ms-3">Student Work</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.testimonials.*') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.testimonials.*') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4s-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h6v-2c0-.34.03-.67.08-1H4c0-1.1 3.58-2 8-2s8 .9 8 2h-6.08c.05.33.08.66.08 1v2h6v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <span class="ms-3">Testimonials</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.criticisms.index') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.criticisms.*') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.criticisms.*') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z" />
                    </svg>
                    <span class="ms-3">Criticism</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.landingsliders.index') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-orange-500 hover:text-white {{ request()->routeIs('admin.landingsliders.*') ? 'bg-orange-500 text-white' : '' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.landingsliders.*') ? 'text-white' : 'text-gray-400' }} group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2.5 4A1.5 1.5 0 014 2.5h12A1.5 1.5 0 0117.5 4v12a1.5 1.5 0 01-1.5 1.5H4A1.5 1.5 0 012.5 16V4zm4.5 0a.5.5 0 000 1h6a.5.5 0 000-1H7z" />
                    </svg>
                    <span class="ms-3">Landing Page</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>
    // Keep dropdowns open when active
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.getElementById('dropdown-example');
        const programDropdown = document.getElementById('dropdown-program');

        // Check if we're on a user-related page
        if (window.location.pathname.includes('/admin/mentors') ||
            window.location.pathname.includes('/admin/visitors') ||
            window.location.pathname.includes('/admin/skills')) {
            userDropdown.classList.remove('hidden');
        }

        // Check if we're on a program-related page
        if (window.location.pathname.includes('/admin/categories') ||
            window.location.pathname.includes('/admin/subcategories')) {
            programDropdown.classList.remove('hidden');
        }
    });
</script>
