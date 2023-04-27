@extends('layouts.app')

@section('content')

<h1>All Tasks</h1><hr>

@foreach ($tasks as $task)
    <h3>Title: {{ $task->title }}</h3>

    <h3>Description: {{ $task->description }}</h3>
    
    <hr>
@endforeach

@endsection