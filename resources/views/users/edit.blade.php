@extends('layouts.app')

@section('title', 'Update')
    
@section('content')
    <h3>Edit user</h3>

    @if ($errors->any()) 
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @if ($errors->has('avatar'))
                    <li>The avatar dimensions must be 200x200 pixels</li>
                @endif
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" 
                value="{{ old('name') ?: $user->name }}">
        </div>
        <div class="mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input type="text" class="form-control" name="alias" 
                value="{{ old('alias') ?: $user->alias }}">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" name="avatar">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('users.index') }}"><button class="btn btn-primary mt-3">Back to User list</button></a>
@endsection