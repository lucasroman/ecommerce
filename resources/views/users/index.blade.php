@extends('layouts.app')

@section('title', 'Users list')

@section('content')
<h3>Users</h3>

<ul class="list-group list-group-flush">
    @foreach ($users as $user)
    <a href="{{route('users.show', $user)}}" class="text-decoration-none">
        <li class="list-group-item">
            <img src="{{Storage::url($user->avatar)}}" 
                class="img-thumbnail rounded-circle" 
                alt="{{ $user->avatar }}" 
                style="height: 6em">
            <h3>{{ $user->name }}</h3>
            <h4>"{{ $user->alias }}"</h4>
        </li>
    </a>
    @endforeach
</ul>

<a href="{{ route('users.create') }}">
    <button class="btn btn-primary">
        New User
    </button>
</a>
@endsection