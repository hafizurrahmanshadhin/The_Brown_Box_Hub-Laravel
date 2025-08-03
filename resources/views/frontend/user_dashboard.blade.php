<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1" />

    <title>@yield('title')</title>
    @include('frontend.partials.styles')
</head>

<body>
    <div class="custom-dashboard">
        @include('frontend.partials.dashboard_sidebar')

        <main class="custom-main-content">
            <header class="custom-topbar">
                <h2 class="custom-page-title">@yield('title')</h2>
                <button class="custom-sidebar-toggle" id="customSidebarToggle">
                    ☰
                </button>
            </header>

            @yield('content')
        </main>
    </div>

    @include('frontend.partials.scripts')
</body>

</html>
