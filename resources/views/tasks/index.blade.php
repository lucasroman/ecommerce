@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>

@foreach ($tasks as $task)
    <h3><b>Id</b> {{ $task->id }}</h3>

    <h3><b>Status:</b> {{$task->done ? 'Done' : 'Incomplete' }}</h3>

    <h3><b>Title:</b> {{ $task->title }}</h3>

    <h3><b>Description:</b> {{ $task->description }}</h3>

    <div class="text-center">
        <div class="row">
        {{-- Edit task button --}}
        <div class="col-sm-1 m-1">
        <input type="button" class="btn btn-primary" 
            onclick="location.href='{{ route('tasks.edit', $task->id) }}'" 
            value="Edit">
        </div>

        <div class="col-sm-1 m-1">
        {{-- Delete task button --}}
        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-primary" value="Delete">
        </div>
        </form>
        </div>
    </div>
    <hr>
@endforeach

@endsection