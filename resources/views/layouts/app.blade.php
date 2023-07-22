<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('img/store.png') }}" type="image/x-icon">
    <title>@yield('title') || Cafe XYZ</title>

    @stack('script')
    @include('include.style')
</head>

<body>
    <div id="wrapper">
        @include('include.sidebar')

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">
            @include('include.navbar')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        {{-- End Content Wrapper --}}
    </div>

    @include('include.script')
</body>

</html>
