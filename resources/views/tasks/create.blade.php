@extends('layouts.app')

@section('content')

<h1>Create Task</h1>

<form method="POST" action={{ route('tasks.store') }}>
    @csrf

    <div>
        <label for="done">Done</label>
        <input id="done" type="checkbox" name="done" value="1">
    </div>

    <div>
        <label for="title">Title</label>
        <input id="title" type="text" name="title">
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">
        </textarea>
    </div>

    <input type="submit" value="Create">
</form>

@endsection