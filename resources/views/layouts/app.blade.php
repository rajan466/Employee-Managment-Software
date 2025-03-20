<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    {{-- my custome css --}}
    <link href="{{ asset('assets/css/myStyles.css') }}" rel="stylesheet">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>

    {{-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom Css-->
    {{-- <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!-- jsvectormap css -->
    {{-- <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!-- Swiper slider css -->
    {{-- <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" /> --}}

    {{-- compony-managment --}}
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Livewire Scripts -->
    @livewireStyles

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <livewire:admin.sidebar />

        <!-- Vertical Overlay-->
        {{-- <div class="vertical-overlay"></div> --}}

        {{-- <div class="main-content">
            @if (!empty($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </div> --}}

        <div class="main-content">
            {{ $slot ?? '' }}

        </div>

        <livewire:admin.footer />

        {{-- Logout Confirmation Modal --}}
        <div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-4 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#405189,secondary:#f06548" style="width:90PX;height:90PX"></lord-icon>
                        <div class="mt-3 text-center">
                            <h4>Are you sure you want to logout?</h4>
                            {{-- <p class="text-muted fs-14 mb-4">Logging out will end your current session.</p> --}}
                            <div class="hstack gap-2 justify-content-center">
                                <button class="btn btn-link btn-ghost-success btn-sm fw-medium text-decoration-none"
                                    data-bs-dismiss="modal">
                                    <i class="ri-close-line me-1 align-middle"></i> Cancel
                                </button>
                                <button class="btn btn-danger btn-sm"
                                    onclick="document.getElementById('login').submit();">
                                    Yes, Logout
                                </button>
                            </div>
                            <form id="login" action="{{ route('admin.login') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Logout Confirmation Modal -->
    </div>

    <!-- Bootstrap required JS -->

    <!-- jQuery Load-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- Swiper Slider -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- ApexCharts & Vector Map -->
    {{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script> --}}


    <!-- ListJS & pagination -->
    {{-- <script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}

    <!-- titcket init js -->
    {{-- <script src={{ asset('assets/js/pages/tasks-list.init.js') }}></script> --}}

    <!-- Sweet Alerts js -->
    {{-- <script src={{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}></script> --}}    

    {{-- <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script> --}}


    {{-- choice library custome code --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".choice").forEach(function(element) {
                new Choices(element, {
                    removeItemButton: false
                });
            });
        });
    </script>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Alpine.js (Livewire) -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
