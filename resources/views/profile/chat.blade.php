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
          @foreach ($chat->reverse() as $msg)          
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
                    @php use Illuminate\Support\Facades\Storage; @endphp
                    {{ return Storage::download($msg->attachFile)}}
                </div>
                @endif
          @endforeach

          {{-- Messages pagination numbers --}}
          <div class="my-3">
            {{ $chat->links() }}
          </div>

          {{-- Input chat message --}}

          <form action="{{route('chats.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="serviceId" value="{{$service->id}}">
            <input type="hidden" name="owner" value="{{$owner->id}}">
            <input type="hidden" name="guest" value="{{$guest->id}}">
            <input type="hidden" name="speaker" 
              value="{{(Auth::user()->id === $service->user_id) ? 0 : 1}}">

              
              <div class="text-center flex">
                <input type="text" name="message" class="rounded-lg block w-full" autofocus>

                
                <div class="ml-3 clear-end border border-2 border-slate-600 rounded-none rounded-l-lg bg-slate-200">
                  <label for="file">
                    <i class="fa-solid fa-paperclip fa-2xl p-3 mt-1.5 text-slate-800">
                    <input id="file" type="file" name="attachFile" class="hidden"></i>
                  </label>
                </div>

                {{-- </x-primary-button> --}}
                <x-primary-button type="submit" class="clear-end border border-y-2 border-r-2 border-slate-600 rounded-none rounded-r-lg">
                  <i class="fa-solid fa-paper-plane-top fa-2xl"></i>
                </x-primary-button>
              </div>

              </div>
            </form>
            

        </div>
      </div>
    </div>  
  </div>
</x-app-layout>
