@extends('layouts.app')

@section('content')

<h1>Edit task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PATCH')

        <div>
        {{-- Show checked checkbox or not depend of 'done' value in database--}}
        <input id="done" type="checkbox" name="done" value="done" 
            @checked(old('done', $task->done)) />
            
        <label for="done">Done</label>
        </div>

        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{$task->title}}">
        </div>

        <div>
            <lable for="description">Description</lable>
            <textarea id="description" name="description" rows="" cols="">
                {{ $task->description }}
            </textarea>
        </div>

        <input type="submit" value="Update">
    </form>

@endsection