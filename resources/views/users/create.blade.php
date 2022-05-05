@extends('layouts.app')

@section('title', 'Create user')

@section('content')
    <h3>Create user</h3>

    <form action="{{ route('users.store') }}" method="post" 
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="alias" class="form-label">Alias</label>
            <input type="text" class="form-control" name="alias">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" name="avatar">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
@endsection
