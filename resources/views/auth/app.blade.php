<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1" />

    <title>@yield('title')</title>
    @include('auth.partials.styles')
</head>

<body>
    @yield('content')

    @include('auth.partials.scripts')
</body>

</html>
