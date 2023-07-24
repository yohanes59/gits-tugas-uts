<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/coffee.png') }}" type="image/x-icon">
    <title>@yield('title') || Cafe XYZ</title>

    @include('include.style')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    
    @include('include.script')
</body>
</html>