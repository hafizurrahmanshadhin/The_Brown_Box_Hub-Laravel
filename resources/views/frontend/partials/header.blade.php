@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<header>
    {{-- navbar starts --}}
    <nav class="navbar-desk">
        <div class="my-container">
            <div class="navbar-content-wrapper">
                <div class="navbar-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" />
                    </a>
                </div>

                <div class="navbar-content">
                    <ul class="nav-items-wrapper" data-aos="fade-left">
                        <li><a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'nav-item-active' : '' }}">Home</a></li>
                        <li><a href="{{ route('about') }}"
                                class="{{ request()->routeIs('about') ? 'nav-item-active' : '' }}">About</a></li>
                        <li><a href="{{ route('pricing') }}"
                                class="{{ request()->routeIs('pricing') ? 'nav-item-active' : '' }}">Pricing</a></li>
                        <li><a href="{{ route('faq') }}"
                                class="{{ request()->routeIs('faq') ? 'nav-item-active' : '' }}">FAQ</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'nav-item-active' : '' }}">Contact</a></li>
                    </ul>
                    <div class="navbar-action-wrapper">
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('dashboard') }}" class="btn-common btn--outline">Dashboard</a>
                            @else
                                <a href="{{ route('user.dashboard.package') }}"
                                    class="btn-common btn--outline">Dashboard</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-common btn--outline">Login / Signup</a>
                        @endauth
                        <a href="{{ $systemSetting->calendly_link ?? '#' }}" class="btn-common btn--primary"
                            target="_blank" rel="noopener noreferrer">Delivery</a>

                        {{-- <a href="https://calendly.com/latricesalvador/brown-box-package-hub-clone"
                            class="btn-common btn--primary" target="_blank" rel="noopener noreferrer">Delivery</a> --}}
                    </div>
                </div>
                <button class="menu-toggle" aria-label="Open menu">☰</button>
            </div>
        </div>
    </nav>
    {{-- navbar ends --}}

    {{-- Mobile Sidebar Start --}}
    <aside class="mobile-sidebar">
        <div class="d-flex align-items-center justify-content-between">
            <div class="mobile-nav-logo">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" />
            </div>
            <button class="sidebar-close" aria-label="Close menu">✕</button>
        </div>

        <ul class="mobile-nav-items">
            <li><a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'nav-item-active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'nav-item-active' : '' }}">About</a></li>
            <li><a href="{{ route('pricing') }}"
                    class="{{ request()->routeIs('pricing') ? 'nav-item-active' : '' }}">Pricing</a></li>
            <li><a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'nav-item-active' : '' }}">FAQ</a>
            </li>
            <li><a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'nav-item-active' : '' }}">Contact</a></li>
        </ul>

        <div class="navbar-action-wrapper">
            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="btn-common btn--outline">Dashboard</a>
                @else
                    <a href="{{ route('user.dashboard.package') }}" class="btn-common btn--outline">Dashboard</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn-common btn--outline">Login / Signup</a>
            @endauth
            <a href="{{ $systemSetting->calendly_link ?? '#' }}" class="btn-common btn--primary" target="_blank"
                rel="noopener noreferrer">Delivery</a>

            {{-- <a href="https://calendly.com/latricesalvador/brown-box-package-hub-clone" class="btn-common btn--primary"
                target="_blank" rel="noopener noreferrer">Delivery</a> --}}
        </div>
    </aside>
    {{-- Mobile Sidebar End --}}

    {{-- Overlay --}}
    <div class="sidebar-overlay"></div>
</header>
