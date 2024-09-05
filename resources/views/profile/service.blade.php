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

              {{-- Show chats buttons foreach guests that contacted 
                to the owner --}}
              @if (Auth::user() == $service->user)
                @foreach ($guests as $guest) 
                  <div class="my-4">
                    <a href="{{ route('chats.show', [$service, $guest]) }}">
                      <x-primary-button>
                        Chat with {{$guest->name}}
                      </x-primary-button>
                    </a>
                  </div>
                @endforeach
              {{-- Show only one button for chat with the service's owner --}}
              @else
                  <a href="{{ route('chats.show', [$service, Auth::user()])}}">
                    <x-primary-button id="submit" class="mt-4 items-center">
                      {{ __('Chat with '. $service->user->name) }}
                    </x-primary-button>    
                  </a>  
              @endif
            </div>            
          </div>      
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
