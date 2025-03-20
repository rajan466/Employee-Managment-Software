<div>
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header" style="height: 53px">
                <h5 class="page-title m-2">{{ $pageTitle }}</h5> <!-- Dynamic Page Title -->
                <div class="d-flex"></div>
                <div class="d-flex align-items-center">
                    {{-- dropdown header --}}
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                           <span class="d-flex align-items-center">
                                <!-- Profile Icon -->
                                <i class="mdi mdi-account-circle text-muted fs-20"></i>
                                <!-- Logout Icon -->
                                <i class="mdi mdi-logout text-muted fs-20 ms-3"></i>
                            </span>
                        </button>
                        {{-- profile and logout --}}
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Anna!</h6>
                            {{-- profile --}}
                            <a class="dropdown-item" href="pages-profile.html">
                                <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1">
                                </i>
                                <span class="align-middle">Profile</span>
                            </a>
                            {{-- profile end --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth-logout-basic.html">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle" data-key="t-logout">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

</div>
