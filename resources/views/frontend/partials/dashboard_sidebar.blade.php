<aside class="custom-sidebar" id="customSidebar">
    <div class="custom-sidebar-header">
        <div class="custom-profile-img">
            <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('backend/images/default_images/user_1.jpg') }}"
                alt="User" />
        </div>

        <div>
            <h4 class="custom-user-name">
                {{ ucfirst(Auth::user()->firstName) . ' ' . ucfirst(Auth::user()->lastName) ?? '' }}</h4>
            <p class="custom-user-plan">Select Plan</p>
        </div>
    </div>

    <div class="custom-sidebar-menu-wrapper">
        <ul class="custom-sidebar-menu">
            <li>
                <a href="{{ route('user.dashboard.package') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.package') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M3.17188 7.44L12.0019 12.55L20.7719 7.46997" stroke="#5A5C5F" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 21.61V12.54" stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M9.9306 2.48L4.59061 5.45003C3.38061 6.12003 2.39062 7.80001 2.39062 9.18001V14.83C2.39062 16.21 3.38061 17.89 4.59061 18.56L9.9306 21.53C11.0706 22.16 12.9406 22.16 14.0806 21.53L19.4206 18.56C20.6306 17.89 21.6206 16.21 21.6206 14.83V9.18001C21.6206 7.80001 20.6306 6.12003 19.4206 5.45003L14.0806 2.48C12.9306 1.84 11.0706 1.84 9.9306 2.48Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M17.0017 13.24V9.58002L7.51172 4.09998" stroke="#5A5C5F" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    Package</a>
            </li>

            <li class="custom-menu-section">Billing</li>
            <li>
                <a href="{{ route('user.dashboard.manage-plan') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.manage-plan') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    Manage Plan</a>
            </li>

            <li>
                <a href="{{ route('user.dashboard.payment') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.payment') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="#5A5C5F" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 18.5C13.3807 18.5 14.5 17.3807 14.5 16C14.5 14.6193 13.3807 13.5 12 13.5C10.6193 13.5 9.5 14.6193 9.5 16C9.5 17.3807 10.6193 18.5 12 18.5Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    Payments</a>
            </li>

            <li class="custom-menu-section">Account</li>
            <li>
                <a href="{{ route('user.dashboard.personal-details') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.personal-details') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12.1586 10.87C12.0586 10.86 11.9386 10.86 11.8286 10.87C9.44859 10.79 7.55859 8.84 7.55859 6.44C7.55859 3.99 9.53859 2 11.9986 2C14.4486 2 16.4386 3.99 16.4386 6.44C16.4286 8.84 14.5386 10.79 12.1586 10.87Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7.15875 14.56C4.73875 16.18 4.73875 18.82 7.15875 20.43C9.90875 22.27 14.4188 22.27 17.1688 20.43C19.5888 18.81 19.5888 16.17 17.1688 14.56C14.4288 12.73 9.91875 12.73 7.15875 14.56Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    Edit Personal Details</a>
            </li>

            <li>
                <a href="{{ route('user.dashboard.security') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.security') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M10.4901 2.23L5.50015 4.09999C4.35015 4.52999 3.41016 5.88998 3.41016 7.11998V14.55C3.41016 15.73 4.19017 17.28 5.14017 17.99L9.44016 21.2C10.8502 22.26 13.1701 22.26 14.5801 21.2L18.8802 17.99C19.8302 17.28 20.6101 15.73 20.6101 14.55V7.11998C20.6101 5.88998 19.6701 4.52999 18.5201 4.09999L13.5302 2.23C12.6802 1.92 11.3201 1.92 10.4901 2.23Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M11.9997 10.92C11.9597 10.92 11.9097 10.92 11.8697 10.92C10.9297 10.89 10.1797 10.11 10.1797 9.16003C10.1797 8.19003 10.9697 7.40002 11.9397 7.40002C12.9097 7.40002 13.6997 8.19003 13.6997 9.16003C13.6897 10.12 12.9397 10.89 11.9997 10.92Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M10.0091 13.72C9.04906 14.36 9.04906 15.41 10.0091 16.05C11.0991 16.78 12.8891 16.78 13.9791 16.05C14.9391 15.41 14.9391 14.36 13.9791 13.72C12.8991 12.99 11.1091 12.99 10.0091 13.72Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    Security</a>
            </li>

            {{-- <li>
                <a href="{{ route('user.dashboard.partner-access') }}"
                    class="custom-sidebar-link {{ request()->routeIs('user.dashboard.partner-access') ? 'active' : '' }}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M9.15859 10.87C9.05859 10.86 8.93859 10.86 8.82859 10.87C6.44859 10.79 4.55859 8.84 4.55859 6.44C4.55859 3.99 6.53859 2 8.99859 2C11.4486 2 13.4386 3.99 13.4386 6.44C13.4286 8.84 11.5386 10.79 9.15859 10.87Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M16.4112 4C18.3512 4 19.9112 5.57 19.9112 7.5C19.9112 9.39 18.4113 10.93 16.5413 11C16.4613 10.99 16.3713 10.99 16.2812 11"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M4.15875 14.56C1.73875 16.18 1.73875 18.82 4.15875 20.43C6.90875 22.27 11.4188 22.27 14.1688 20.43C16.5888 18.81 16.5888 16.17 14.1688 14.56C11.4288 12.73 6.91875 12.73 4.15875 14.56Z"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M18.3398 20C19.0598 19.85 19.7398 19.56 20.2998 19.13C21.8598 17.96 21.8598 16.03 20.2998 14.86C19.7498 14.44 19.0798 14.16 18.3698 14"
                                stroke="#5A5C5F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    Partner Access</a>
            </li> --}}
        </ul>
    </div>

    <button class="btn-common btn--primary custom-logout-btn"
        onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <path
                    d="M15.1016 16.44C14.7916 20.04 12.9416 21.51 8.89156 21.51H8.76156C4.29156 21.51 2.50156 19.72 2.50156 15.25V8.72999C2.50156 4.25999 4.29156 2.46999 8.76156 2.46999H8.89156C12.9116 2.46999 14.7616 3.91999 15.0916 7.45999"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.99891 12H20.3789" stroke="white" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M18.15 15.35L21.5 12L18.15 8.65001" stroke="white" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </span>
        Logout
    </button>
    <form action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
</aside>
