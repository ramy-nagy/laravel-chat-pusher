<x-guest-layout>


    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <!-- Validation Errors -->
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                src="{{asset('assets/img/login-office.jpeg')}}" alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                src="{{asset('assets/img/login-office-dark.jpeg')}}" alt="Office" />
        </div>

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    {{__('Login')}}
                </h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Email')}} / {{__('Name')}} /
                            {{__('Phone')}}</span>
                        <x-input id="email"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="email" :value="old('email')" required autofocus />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Password')}}</span>
                        <x-input id="password"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="password" name="password" required autocomplete="current-password" />
                    </label>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-gray-700 dark:text-gray-400 ">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <p class="mt-4">
                        <x-button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{ __('Log in') }}
                        </x-button>
                    </p>
                    <hr class="my-8" />
                    <p class="mt-4">
                        @if (Route::has('register'))
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            href="{{ route('register') }}">
                            {{ __('Create account') }}
                        </a>
                        @endif
                    </p>
                    <p class="mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </p>

                </form>
            </div>
        </div>

    </div>
</x-guest-layout>