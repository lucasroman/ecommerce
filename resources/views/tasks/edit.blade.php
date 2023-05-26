@extends('layouts.app')

@section('content')

<h1>Edit task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PATCH')

        <div>
        {{-- Show checked checkbox or not depend of 'done' value in database--}}
        <label for="done">Done</label>
        <input id="done" type="checkbox" name="done" value="1" 
            @checked(old('active', $task->done))>
            
        </div>

        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{$task->title}}">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="" cols="">
                {{ $task->description }}
            </textarea>
        </div>

        <input type="submit" value="Update">
    </form>

@endsection