<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-900 bg-opacity-80 backdrop-blur shadow-md transition duration-300">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16 text-white">

            <!-- Logo -->
            <div class="flex items-center cursor-pointer">
                <!-- Teks -->
                <div class="leading-none">
                    <div class="font-bold text-orange-500 text-[10px] ">
                        CREATIVE <br>
                        <span class="text-orange-500">MEDIA</span>
                    </div>
                    <div class="text-[8px] text-slate-200 tracking-wide uppercase mt-0.5">SMART INSIDE . <br> EXPLORE
                        OUTSIDE
                    </div>
                </div>
            </div>

            <!-- Hamburger (Mobile) -->
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-200 rounded-lg lg:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu (Desktop) -->
            <div class="hidden lg:flex space-x-4 xl:space-x-6 text-sm font-medium text-gray-100">
                <a href="{{ route('home') }}" class="hover:text-orange-400">Beranda</a>
                <a href="#" class="hover:text-orange-400">Profil</a>

                @php
                    use App\Models\Category;
                    $categories = Category::with('subCategories')->get();
                @endphp

                @foreach ($categories as $category)
                    <div class="relative group">
                        <span class="cursor-pointer hover:text-orange-400">{{ $category->title }}</span>
                        @if ($category->subCategories->count() > 0)
                            <div
                                class="absolute left-0 mt-0 w-64 bg-slate-700 text-gray-100 border border-gray-600 shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 z-50">
                                <ul class="py-2 text-sm">
                                    @foreach ($category->subCategories as $subCategory)
                                        <li>
                                            <span
                                                class="block px-4 py-2 hover:bg-orange-100 hover:text-slate-900 cursor-pointer">
                                                {{ $subCategory->title }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endforeach

                <a href="#" class="hover:text-orange-400">Karya Siswa</a>
                <a href="#" class="hover:text-orange-400">Testimoni</a>
                <a href="#" class="hover:text-orange-400">Artikel</a>
                <a href="#" class="hover:text-orange-400">Hubungi Kami</a>
            </div>

            <!-- Login Button -->
            <div class="hidden lg:block">
                @auth
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <button type="button"
                                class="flex text-sm bg-gray-700 rounded-full focus:ring-4 focus:ring-orange-300"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <img class="w-8 h-8 rounded-full object-cover"
                                    src="{{ Auth::user()->img ? asset('storage/' . Auth::user()->img) : asset('images/default-profile.jpg') }}"
                                    alt="{{ Auth::user()->name }}">
                            </button>
                            <!-- Dropdown -->
                            <div class="z-50 hidden my-4 text-base list-none bg-[#1e293b] divide-y divide-gray-700 rounded shadow"
                                id="dropdown-user">
                                <div class="px-4 py-3">
                                    <p class="text-sm text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-sm font-medium text-gray-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <ul class="py-1">
                                    <li>
                                        <a href="{{ Auth::user()->role === 'admin' || Auth::user()->role === 'mentor' ? '/admin/dashboard' : '/' }}"
                                            class="block px-4 py-2 text-sm text-white hover:bg-orange-500">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-white hover:bg-orange-500">Settings</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-white hover:bg-orange-500">
                                                Sign out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 text-sm font-medium">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar Drawer (Mobile) -->
<div id="default-sidebar"
    class="fixed top-0 left-0 z-[100] w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-slate-800 text-white lg:hidden"
    tabindex="-1" aria-labelledby="drawer-label">
    <div class="flex justify-between items-center">
        <img src="/images/logo-remove.png" alt="Creative Media Logo" class="h-8">
        <button type="button" data-drawer-hide="default-sidebar" aria-controls="default-sidebar"
            class="text-gray-300 hover:bg-gray-600 hover:text-white rounded-lg text-sm p-1.5">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>

    <div class="mt-4 space-y-2 text-sm font-medium text-gray-100">
        <a href="#" class="block px-4 py-2 hover:text-orange-400">Beranda</a>
        <a href="#" class="block px-4 py-2 hover:text-orange-400">Profil</a>

        <!-- Dropdown (Mobile) -->
        @foreach ($categories as $category)
            <details class="group">
                <summary class="px-4 py-2 cursor-pointer hover:text-orange-400">{{ $category->title }}</summary>
                @if ($category->subCategories->count() > 0)
                    <div class="pl-6 py-2">
                        @foreach ($category->subCategories as $subCategory)
                            <span class="block py-1 hover:text-orange-300 cursor-pointer">
                                {{ $subCategory->title }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </details>
        @endforeach

        <a href="#" class="block px-4 py-2 hover:text-orange-400">Karya Siswa</a>
        <a href="#" class="block px-4 py-2 hover:text-orange-400">Testimoni</a>
        <a href="#" class="block px-4 py-2 hover:text-orange-400">Artikel</a>
        <a href="#" class="block px-4 py-2 hover:text-orange-400">Hubungi Kami</a>

        @auth
            <!-- Dropdown User Mobile -->
            <details class="group">
                <summary class="px-4 py-2 bg-gray-700 rounded cursor-pointer text-white hover:bg-orange-500">
                    {{ Auth::user()->name }}
                </summary>
                <div class="pl-6 py-2">
                    <a href="{{ Auth::user()->role === 'admin' || Auth::user()->role === 'mentor' ? '/admin/dashboard' : '/' }}"
                        class="block py-1 hover:text-orange-300">Dashboard</a>
                    <a href="#" class="block py-1 hover:text-orange-300">Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-1 hover:text-orange-300">
                            Sign out
                        </button>
                    </form>
                </div>
            </details>
        @else
            <a href="{{ route('login') }}"
                class="block px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 text-center">
                Login
            </a>
        @endauth
    </div>
</div>
