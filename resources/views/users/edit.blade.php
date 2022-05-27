@extends('layouts.app')

@section('title', 'Update')
    
@section('content')
    <h3>Edit user</h3>
    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('patch')
        <input type="text" name="name" value="{{ old('name')}}" 
            placeholder="{{ $user->name }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
@endsection