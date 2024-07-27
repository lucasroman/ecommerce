<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('List of Services') }}
    </h2>
  </x-slot>
    
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <ul>
            @forelse (Auth::user()->services as $service)
              <a href="{{ route('service', $service) }}">
                <li>{{$service->name}}</li>
              </a>
            @empty

            There are not services yet. Why don't add one?
            <a href="#">
              <button>Add new service</button>
            </a>
            @endforelse
          </ul>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>