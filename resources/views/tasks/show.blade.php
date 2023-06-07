@extends('layouts.app')

@section('content')

<h1>Show Task</h1>

<h3>Id {{$task->id}}</h3>

<h3>Title: {{$task->title}}</h3>

<h3>Description: {{$task->description}}</h3>

@endsection
