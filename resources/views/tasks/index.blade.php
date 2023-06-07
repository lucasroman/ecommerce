@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>


<ul class="list-group">
@foreach ($tasks as $task)
    <li class="list-group-item">
        <h2>
        {{$task->title}}
        <a class=" text-decoration-none" href="{{route('tasks.show', $task)}}">
            <i class="far fa-eye" style="color: #0080ff;"></i>
        </a>
        <a class=" text-decoration-none" href="{{route('tasks.edit', $task)}}">
            <i class="fas fa-edit" style="color: #0080ff;"></i>
        </a>

        <form method="POST" action={{route('tasks.destroy', $task)}}>
            @csrf
            @method('DELETE')
            <input type="submit">
            <a class=" text-decoration-none" type="submit"
            href="{{route('tasks.destroy', $task)}}">
            <i class="fas fa-trash-alt" style="color: #0080ff;"></i>
        </a>
        </form>
        </h2>
    </li>
    @endforeach
</ul>

@endsection