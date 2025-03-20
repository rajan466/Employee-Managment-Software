<style>
    .sidebar-footer {
        position: absolute;
        bottom: 0px;
        left: 50%;
        transform: translateX(-45%);
        display: flex !important;
        justify-content: center !important;
        gap: 0px;
        width: 100%;
    }

    .sidebar-footer .nav-link i {
        font-size: 22px;
    }    

    /* SIDEBAR STYLES */
    .navbar-nav .nav-item .nav-link.active {
        background-color: #007bff !important;
        color: white !important;
        font-weight: bold;
        border-radius: 5px;
    }
</style>

<div>
    {{-- Sidebar and logo --}}
    <div class="app-menu navbar-menu">
        {{-- logos --}}
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="{{ route('dashboard') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="" height="17">
                </span>
            </a>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">
                <div id="two-column-menu"></div>

                {{-- Sidebar Start --}}
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/dashboard" wire:navigate>
                            <i class="ri-dashboard-2-line"></i>
                            <span data-key="t-dashboards">Dashboards</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/company" wire:navigate>
                            <i class="fa-solid fa-building"></i> <span data-key="t-apps">Company</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/project" wire:navigate>
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Project</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/task" wire:navigate>
                            <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Task</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/staff" wire:navigate>
                            <i class="ri-account-circle-line"></i>
                            <span data-key="t-authentication">Staff</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/report" wire:navigate>
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Report</span>
                        </a>
                    </li>
                </ul>

                {{-- Profile & Logout - Fixed at Bottom --}}
                <ul class="navbar-nav sidebar-footer">
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="/profile" wire:navigate>
                            <i class="ri-user-line"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link text-danger" href="#" data-bs-toggle="modal"
                            data-bs-target="#logoutConfirmModal">
                            <i class="ri-logout-box-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>





{{-- Profile --}}
{{-- <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                            href="{{ route('profile') }}">
                            <!-- Profile Icon -->
                            <i class="mdi mdi-account-circle text-muted fs-20"></i> <span
                                data-key="t-pages">Profile</span>
                        </a>
                    </li> --}}
{{-- Profile end --}}

{{-- Logout --}}
{{-- <li class="nav-item">
    <a class="nav-link menu-link"
        href="#" data-bs-toggle="modal" data-bs-target="#logoutConfirmModal">
        <i class="mdi mdi-logout text-muted fs-20"></i> <span data-key="t-pages">Logout</span>
    </a>
</li> --}}
{{-- Logout end --}}
