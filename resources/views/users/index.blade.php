@extends('layouts.app')

@section('title', 'Users list')

@section('content')
    <h3>Users</h3>
    <ul class="list-group list-group-flush">
    @foreach ($users as $user)
        
            <li class="list-group-item">
                <a href="{{route('users.show', $user)}}">{{ $user->name }}
                </a>
                </li>
    @endforeach
    </ul>

    <a href="{{ route('users.create') }}">
        <button class="btn btn-primary">
            New User
        </button>
    </a>
@endsection