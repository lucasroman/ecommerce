@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>

<div class="d-flex container-fluid">
@foreach ($tasks as $task)
    <div class="card me-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$task->title}}</h5>

            <h6 class="card-subtitle mb-2 text-body-secondary">
                {{$task->done ? 'Done' : 'Incomplete'}}
            </h6>

            <p class="card-text">{{$task->description}}</p>

            {{-- Edit task button --}}
            <div class="d-flex gap-2 ms-3">
            <a class="btn btn-primary rounded-pill px-3" 
                href="{{route('tasks.edit', $task->id)}}">Edit</a>

            {{-- Delete task button --}}
            <form method="POST" action="{{route('tasks.destroy', $task->id)}}">
                @csrf
                @method('DELETE')
                <input class="btn btn-primary rounded-pill px-3" 
                onclick="return confirm('Are you sure you want to delete this task?')" type="submit" value="Delete">
            </form>
            </div>
        </div>
        </div>
        
@endforeach
</div>

@endsection