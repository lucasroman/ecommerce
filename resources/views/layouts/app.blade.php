<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
</head>
<body>
    @yield('content')

    <button onclick="location.href='{{ route('home') }}'" type="button">
        Back to Home
    </button>
</body>
</html>