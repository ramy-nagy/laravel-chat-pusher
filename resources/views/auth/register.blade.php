<x-guest-layout>
    <!-- Validation Errors -->
    {{--
    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="h-32 md:h-auto md:w-1/2">
            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                src="{{asset('assets/img/create-account-office.jpeg')}}" alt="Office" />
            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                src="{{asset('assets/img/create-account-office-dark.jpeg')}}" alt="Office" />
        </div>
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    {{__('Create account')}}
                </h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Name')}}</span>
                        <x-input id="name"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" :value="old('name')" required autofocus />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Email')}}</span>
                        <x-input id="email"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="email" name="email" :value="old('email')" required />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Phone')}}</span>
                        <x-input id="phone"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="tel" name="phone" :value="old('phone')" required />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">{{__('Password')}}</span>
                        <x-input id="password"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="password" name="password" required autocomplete="new-password" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            {{__('Confirm password')}}
                        </span>
                        <x-input id="password_confirmation"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            type="password" name="password_confirmation" required />
                    </label>
                    <x-button
                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Register') }}
                    </x-button>
                    <hr class="my-8" />
                    <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                        href="{{ route('login') }}">
                        {{ __('Already have an account? Login') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>