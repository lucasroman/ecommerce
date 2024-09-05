<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-4">{{$service->name}} 
            (by {{ $service->user->name }})</h1>
        </div>
        
        {{-- Show history chat messages --}}
        @foreach ($chat as $msg)          
        <div class="text-white">
            
            @if ($msg->speaker)
              <div class="size-fit rounded-lg mb-2 p-2 bg-amber-800 shadow-lg">
                <p class="font-bold">{{$guest->name}}</p>{{$msg->message}}
              </div>
            @else
              <div class="size-fit rounded-lg mb-2 p-2 bg-lime-800 shadow-lg text-right">
                <p class="font-bold">{{$owner->name}}</p>{{$msg->message}}
              </div>
            @endif
          </div>  
        @endforeach
        
        {{-- Input chat message --}}
        <form action="{{route('chats.store')}}" method="post">
          @csrf
          <input type="hidden" name="serviceId" value="{{$service->id}}">
          <input type="hidden" name="owner" value="{{$owner->id}}">
          <input type="hidden" name="guest" value="{{$guest->id}}">
          <input type="text" name="message">
          <input type="hidden" name="speaker" 
            value="{{(Auth::user()->id === $service->user_id) ? 0 : 1}}">
          <x-primary-button type="submit">Send</x-primary-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
