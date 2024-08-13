<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-4">{{$service->name}}</h1>
        </div>
        
        {{-- Show history chat messages --}}
        @foreach ($messagesHistory as $message)          
          <div class="text-white">
            {{$message->service->user->name}}:
            {{$message->message}}<br>
          </div>  

        @endforeach
        
        {{-- Input chat message --}}
        <form action="{{route('chat.store')}}" method="post">
          @csrf
          <input type="hidden" name="serviceId" value="{{$service->id}}">
          <input type="hidden" name="owner" value="{{$service->user}}">
          <input type="hidden" name="guest" value="{{Auth::user()}}">
          <input type="text" name="message">
          <x-primary-button type="submit">Send</x-primary-button>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>