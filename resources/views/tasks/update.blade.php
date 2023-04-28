@extends('layous.app')

@section('content')

<h1>Update task</h1>

    <form method="POST" action="{{ route('tasks.update') }}">
        @crsf
        @method('patch')

        <div>
        <input id="done" type="checkbox" name="done" value="1">
        <label for="done">Done</label>
        </div>

        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title">
        </div>

        <div>
            <lable for="description">Description</lable>
            <textarea id="description" name="description" rows="4" cols="50">
            </textarea>
        </div>

        <input type="submit" value="Update">
    </form>

@endsection