<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            {{-- Avatar image --}}
                <div class="text-white bg-auto mr-20 mt-2" style="width:3rem">
                    <img src="{{url('avatars/' . Str::snake(Auth::user()->name) . '.jpg')}}" alt="Avatar" class="rounded-full">
                </div>

            {{-- My dropdown menu replaced by Luke --}}
            
            <div class="max-w-lg mx-auto p-8 py-5 absolute right-0 inset-y-0">
            <details class="text-sm text-black open:ring-1 open:bg-white open:ring-black/5 text-slate-900 rounded-lg px-4">
                <summary class="select-none text-slate-400">
                    {{ Auth::user()->name }}
                </summary>
                <ul class="text-slate-500">
                    <li><a href="{{ route('users.edit') }}">Edit</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </details>
            </div>
        </div>
    </div>
</nav>
