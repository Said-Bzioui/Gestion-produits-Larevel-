<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 " :status="session('status')" />

    <form class="" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- ERRORS -->
        <x-input-error :messages="$errors->get('email')" class="mb-6 text-gray-300 animate-error " />
        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-1 w-full " type="email" name="email" placeholder="email"
                :value="old('email')" required autofocus autocomplete="username" />
                
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                placeholder="*********" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between my-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="flex items-center justify-center mt-10">
            <x-primary-button class="uppercase">
                {{ __('connexion') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
