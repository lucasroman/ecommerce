<nav x-data="{ open: true }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
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
            
            
            {{-- My dropdown menu replaced by Luke --}}
            <div class="flex mt-1 absolute right-0 px-6">
                {{-- Avatar image --}}
                <div class="w-14">
                    <img class="rounded-full" src="{{asset(Auth::user()->avatar)}}" alt="avatar">
                </div>
                <details class="mt-4 text-sm text-black open:ring-1 open:bg-white text-slate-900 rounded-lg mx-4 px-3 pb-2">
                    <summary class="select-none text-slate-400" style="list-style: none;">
                        <i class="fa-regular fa-angle-right fa-xl"></i>
                        {{ Auth::user()->name }}
                    </summary>
                    <ul class="text-slate-500">
                        <li><a href="{{ route('users.edit') }}">Edit</a></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </details>
            </div>
    </div>
</nav>
