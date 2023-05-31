@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>

@foreach ($tasks as $task)
    <h3><b>Id</b> {{ $task->id }}</h3>

    <h3><b>Status:</b> {{$task->done ? 'Done' : 'Incomplete' }}</h3>

    <h3><b>Title:</b> {{ $task->title }}</h3>

    <h3><b>Description:</b> {{ $task->description }}</h3>

    <div class="d-flex gap-2 ms-3">
        {{-- Edit task button --}}
        <a href="{{ route('tasks.edit', $task->id) }}">
            <button class="btn btn-primary rounded-pill px-3" type="button">
                Edit
            </button>
        </a>
        
        {{-- Delete task button --}}
        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
            @csrf
            @method('delete')
            <input class="btn btn-primary rounded-pill px-3" 
                type="submit" value="Delete">
        </form>
        
    </div>

    <hr>
@endforeach

@endsection