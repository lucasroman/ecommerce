<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-4">{{$service->name}} 
            (by {{ $service->user->name }})</h1>
        </div>
        
        <div class="m-3 w-1/3 bg-slate-500 rounded-lg p-4 grid ">            
          {{-- Show history chat messages --}}
          @foreach ($chat as $msg)          
              @if ($msg->speaker)
                <div class="size-fit rounded-lg mb-2 p-2 bg-slate-300 shadow-xl text-black clear-end">
                  
                  <p><b>{{$guest->name}}</b> 
                    ({{($msg->created_at->diffForHumans())}})</p>{{$msg->message}}
                </div>
              @else
                <div class="size-fit rounded-lg mb-2 p-2 bg-indigo-900 shadow-xl text-right text-white grid justify-self-end">
                  <p><b>{{$owner->name}}</b> 
                    ({{$msg->created_at->diffForHumans()}})</p>
                    {{$msg->message}}
                </div>
                @endif
          @endforeach
          
          {{-- Input chat message --}}

          <form action="{{route('chats.store')}}" method="post">
            @csrf
            <input type="hidden" name="serviceId" value="{{$service->id}}">
            <input type="hidden" name="owner" value="{{$owner->id}}">
            <input type="hidden" name="guest" value="{{$guest->id}}">
            <input type="hidden" name="speaker" 
              value="{{(Auth::user()->id === $service->user_id) ? 0 : 1}}">
            <div class="text-center flex">
              <input type="text" name="message" class="rounded-lg block w-full">
              <x-primary-button type="submit" class="ml-3 clear-end ">
                  Send
              </x-primary-button>
            </div>
          </form>

        </div>
      </div>
    </div>  
  </div>
</x-app-layout>
