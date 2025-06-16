<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#0f172a] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-[#1e293b] p-8 rounded-xl shadow-2xl">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                    Welcome Back
                </h2>
                <p class="mt-2 text-center text-sm text-gray-400">
                    Please sign in to your account
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-orange-500" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                    <x-text-input id="email"
                        class="block mt-1 w-full bg-[#0f172a] border-gray-700 text-white focus:border-orange-500 focus:ring-orange-500 rounded-lg"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-100" />
                    <x-text-input id="password"
                        class="block mt-1 w-full bg-[#0f172a] border-gray-700 text-white focus:border-orange-500 focus:ring-orange-500 rounded-lg"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-700 bg-[#0f172a] text-orange-500 focus:ring-orange-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-500 hover:text-orange-400 transition-colors duration-200"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors duration-200">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-orange-400 group-hover:text-orange-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('Sign in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
