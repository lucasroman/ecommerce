<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-4">{{$service->name}}</h1>

          <div class="flex">
            <div class="flex-none mr-4">
              <img src="{{asset($service->image)}}" alt="image service">
            </div>

            <div class="" style="margin-top:-7px">
              <p>{{$service->description}}</p>

              {{-- Don't show chat button on your own services --}}
              @if ($service->user != Auth::user())
                <x-primary-button id="submit" class="mt-4 items-center">
                  {{ __('Chat with '. $service->user->name) }}
                </x-primary-button>    
              @endif
            </div>            

          </div>      
        </div>
      </div>
    </div>
  </div>
</x-app-layout>