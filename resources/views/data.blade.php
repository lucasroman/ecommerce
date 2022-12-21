<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session Variable</title>
</head>
<body>
    @if ($name == "")
        <p>No session name set yet.</p>
    @else
        <p>Previous session name is: <b>{{ $name }}</b></p>
    @endif

    <form method="post" action="{{ route('data.store') }}">
        @csrf
        <label for="name">Save you name:</label>
        <input type="text" name="name">
        <button type="submit">Save</button>
    </form>
</body>
</html>
