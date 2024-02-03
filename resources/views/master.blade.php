<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@include('include.style')
<title>
    Laravel |
    @yield('page_title')
</title>

</head>

<body>
    <header>
        @include('include.navbar')
    </header>

    <div class="container">
        @yield('content')
    </div>

    @include('include.scripts')
</body>

</html>
