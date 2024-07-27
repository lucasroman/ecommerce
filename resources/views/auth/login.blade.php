<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button id="submit" class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>    
        </div>

        @env('local')
        {{-- Autologin just for test on local environment --}}
        {{-- The code below won't show up on production environment --}}
            <div class="text-white">
                <button type="submit">
                    <a id="first-user" class="text-white">
                        Login as {{ App\Models\User::first()->name }}
                    </a>
                </button>
                <br>
                <button type="submit">
                    <a id="second-user" class="text-white">
                        Login as {{ App\Models\User::find(2)->name }}
                    </a>
                </button>
            </div>
        @endenv
    </form>
</x-guest-layout>

@env('local')
    {{-- This code just appear on local environment --}}
    {{-- Use JQuery to fill login form fields with users on database --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $('#first-user').on("click", function(event) {
            $('#email').val('luke@example.com');
            $('#password').val('14164');
        });
        $('#second-user').on("click", function(event) {
            $('#email').val('jdoe@example.com');
            $('#password').val('1234');
        });
    </script>
@endenv