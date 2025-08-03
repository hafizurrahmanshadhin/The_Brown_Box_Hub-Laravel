@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<div class="app-menu navbar-menu">
    {{-- Logo & Toggle Button --}}
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/images/logo.png') }}" alt="Logo"
                    style="height: 10px;">
            </span>

            <span class="logo-lg">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/images/logo.png') }}" alt="Logo"
                    style="height: 45px;">
            </span>
        </a>

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/images/logo.png') }}" alt="Logo"
                    style="height: 10px;">
            </span>

            <span class="logo-lg">
                <img src="{{ asset($systemSetting->logo ?? 'frontend/images/logo.png') }}" alt="Logo"
                    style="height: 45px;">
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>

        <div class="vertical-menu-btn-wrapper header-item vertical-icon">
            <button type="button"
                class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon"
                id="topnav-hamburger-icon">
                <i class='bx bx-chevrons-right'></i>
                <i class='bx bx-chevrons-left'></i>
            </button>
        </div>
    </div>
    {{-- Logo & Toggle Button --}}

    <div id="scrollbar">
        {{-- Sidebar Start --}}
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                {{-- Users --}}
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                        <i class="ri-group-line"></i>
                        <span data-key="t-dashboard">Users</span>
                    </a>
                </li>

                {{-- Calendly --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('calendly.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('calendly.index') ? 'active' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span data-key="t-dashboard">Calendly Events</span>
                    </a>
                </li> --}}

                {{-- Subscription Package --}}
                <li class="nav-item">
                    <a href="{{ route('subscription.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('subscription.*') ? 'active' : '' }}">
                        <i class="ri-vip-crown-line"></i>
                        <span data-key="t-faq">Subscription Package</span>
                    </a>
                </li>

                {{-- Contacts --}}
                <li class="nav-item">
                    <a href="{{ route('contacts.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                        <i class="ri-contacts-book-line"></i>
                        <span data-key="t-Contact">Contacts</span>
                    </a>
                </li>

                {{-- Work Process --}}
                <li class="nav-item">
                    <a href="{{ route('work-process.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('work-process.*') ? 'active' : '' }}">
                        <i class="ri-task-line"></i>
                        <span data-key="t-work-process">Work Process</span>
                    </a>
                </li>

                {{-- Grow Philadelphia Business --}}
                <li class="nav-item">
                    <a href="{{ route('grow-philadelphia-business.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('grow-philadelphia-business.*') ? 'active' : '' }}">
                        <i class="ri-bar-chart-line"></i>
                        <span data-key="t-grow-philadelphia-business">Philadelphia Business</span>
                    </a>
                </li>

                {{-- Establish Philadelphia Presence --}}
                <li class="nav-item">
                    <a href="{{ route('establish-philadelphia-presence.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('establish-philadelphia-presence.*') ? 'active' : '' }}">
                        <i class="ri-building-line"></i>
                        <span data-key="t-grow-philadelphia-business">Philadelphia Presence</span>
                    </a>
                </li>

                {{-- Frequently Asked Questions --}}
                <li class="nav-item">
                    <a href="{{ route('faq.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('faq.*') ? 'active' : '' }}">
                        {{-- <i class="ri-question-line"></i> --}}
                        <i class="ri-information-line"></i>
                        <span data-key="t-faq">FAQ</span>
                    </a>
                </li>

                {{-- Clients Feedback --}}
                <li class="nav-item">
                    <a href="{{ route('clients-feedback.index') }}"
                        class="nav-link menu-link {{ request()->routeIs('clients-feedback.*') ? 'active' : '' }}">
                        <i class="ri-feedback-line"></i>
                        <span data-key="t-faq">Clients Feedback</span>
                    </a>
                </li>

                <hr>
                {{-- Settings --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/settings*') ? 'active' : '' }}"
                        href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('admin/settings*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPages">
                        <i class="ri-settings-3-line"></i>
                        <span data-key="t-pages">Settings</span>
                    </a>

                    <div class="collapse menu-dropdown {{ request()->is('admin/settings*') ? 'show' : '' }}"
                        id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('profile.setting') }}"
                                    class="nav-link {{ request()->routeIs('profile.setting') ? 'active' : '' }}"
                                    data-key="t-profile-setting">
                                    Profile Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('system.index') }}"
                                    class="nav-link {{ request()->routeIs('system.index') ? 'active' : '' }}"
                                    data-key="t-system-settings">
                                    System Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('mail.setting') }}"
                                    class="nav-link {{ request()->routeIs('mail.setting') ? 'active' : '' }}"
                                    data-key="t-smtp-settings">
                                    SMTP Server
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('integration.setting') }}"
                                    class="nav-link {{ request()->routeIs('integration.setting') ? 'active' : '' }}"
                                    data-key="t-integration-settings">
                                    Integration Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('social.index') }}"
                                    class="nav-link {{ request()->routeIs('social.index') ? 'active' : '' }}"
                                    data-key="t-social-media-settings">
                                    Social Media Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('settings.dynamic_page.index') }}"
                                    class="nav-link {{ request()->routeIs('settings.dynamic_page.*') ? 'active' : '' }}"
                                    data-key="t-dynamic-page-settings">
                                    Dynamic Page Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('terms-and-conditions.index') }}"
                                    class="nav-link {{ request()->routeIs('terms-and-conditions.index') ? 'active' : '' }}"
                                    data-key="t-terms-and-conditions">
                                    Terms $ Conditions
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('privacy-policy.index') }}"
                                    class="nav-link {{ request()->routeIs('privacy-policy.index') ? 'active' : '' }}"
                                    data-key="t-terms-and-conditions">
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        {{-- Sidebar End --}}
    </div>

    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
