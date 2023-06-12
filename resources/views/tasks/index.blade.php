@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>


<ul class="list-group">
@foreach ($tasks as $task)
    <li class="list-group-item  bg-{{$task->done ? 'success': 'danger'}}
        text-light">

        <h2>
        {{$task->title}}
        
        {{-- Show and Edit icons doesn't need be inside of form 
        but I put in for align them --}}

        <form method="POST" action={{route('tasks.destroy', $task)}}>
            @csrf
            @method('DELETE')
            
            <a class=" text-decoration-none" 
                href="{{route('tasks.show', $task)}}">
                <i class="far fa-eye" style="color: white;"></i>
            </a>

            <a class="text-decoration-none" 
                href="{{route('tasks.edit', $task)}}">
                <i class="fas fa-edit" style="color: white"></i>
            </a>

            <button class="btn-lg" type="submit" 
                style="background-color: transparent; border:none;" 
                href="{{route('tasks.destroy', $task)}}">
                <i class="fas fa-trash-alt" style="color: white"></i>
            </button>
        </form>
        </h2>
    </li>
    @endforeach
</ul>

@endsection