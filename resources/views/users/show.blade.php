@extends('layouts.app')

@section('content')
    {{-- Flash upload message --}}
    @if (session('uploadStatus'))
        <div class="alert alert-success">
            {{ session('uploadStatus') }}
        </div>
    @endif
    
    <h3>{{ $user->name }}</h3>

    <h4>"{{ $user->alias }}"</h4>
    
    {{-- Image to render --}}
    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar image here">

    <div class="mt-3">
        <form action="{{ route('users.destroy', $user) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">
                Delete User
            </button>
        </form>
    </div>

    <a href="{{ route('users.index') }}"><button class="btn btn-primary mt-3">Back to users list</button></a>
@endsection
