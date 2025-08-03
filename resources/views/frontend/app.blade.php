<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1" />

    <title>@yield('title')</title>
    @include('frontend.partials.styles')
</head>

<body>
    @include('frontend.partials.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')
    @include('frontend.partials.scripts')
</body>

</html>
