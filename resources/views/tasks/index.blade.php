@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>

@foreach ($tasks as $task)
    <h3><b>Id</b> {{ $task->id }}</h3>

    <h3><b>Title:</b> {{ $task->title }}</h3>

    <h3><b>Description:</b> {{ $task->description }}</h3>

    {{-- Edit task button --}}
    <input type="button" class="btn btn-primary" onclick="location.href=
        '{{ route('tasks.edit', $task->id) }}'" value="Edit JS" />
    <hr>
@endforeach

@endsection