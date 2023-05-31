@extends('layouts.app')

@section('content')

<h1>Developer panel</h1>

<button onclick="location.href='{{ route('tasks.index') }}'">
    All tasks
</button>

<button onclick="location.href='{{ route('tasks.create') }}'">
    Create task
</button>

@endsection