<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-2xl mb-4">{{$service->name}}</h1>

        </div>
        
        <form action="{{route('chat.store')}}" method="post">
          @csrf
          <input type="text">
          <x-primary-button type="submit">Send</x-primary-button>
        </form>

      </div>
    </div>
  </div>

</x-app-layout>