@extends('layouts.app')

@section('content')
    {{-- Flash upload message --}}
    @if (session('uploadStatus'))
        <div class="alert alert-success">
            {{ session('uploadStatus') }}
        </div>
    @endif
    
    {{-- Image to render --}}
    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar image here">
    
@endsection
