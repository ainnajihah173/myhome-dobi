<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>My Home Dobi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/brand.png') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />

    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />


</head>

<!--
    theme light for customer #fff
    theme dark for staff #73C0BF
    theme default for admin #9BCADD
-->

@if (auth()->user()->role === 'Admin')

    <body class="loading"
        data-layout-config='{"leftSideBarTheme":"default","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false, "showRightSidebarOnStart": true}'>
    @elseif(auth()->user()->role === 'Staff')

        <body class="loading"
            data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false, "showRightSidebarOnStart": true}'>
        @else

            <body class="loading"
                data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false, "showRightSidebarOnStart": true}'>
@endif
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu logo-light">

        <!-- LOGO -->
        <a href="" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="85">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/brand.png') }}" alt="" height="40">
            </span>
        </a>

        <div class="h-100" id="left-side-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav mt-3">
                <div class="side-nav-link">
                    <a href="javascript: void(0);">
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="35"
                            class="rounded-circle shadow-sm">
                        <div class="user-avatar">
                            <span class="leftbar-user-name text-dark fw-bold">{{ auth()->user()->name }}</span>
                            <p class="text-dark font-12 mb-0">{{ auth()->user()->role }}</p>
                        </div>
                    </a>
                </div>
                <li class="side-nav-title side-nav-item text-dark">Menu</li>
                <li class="side-nav-item">
                    <a href="{{ route('dashboard') }}" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-user"></i>
                        <span> Profile </span>
                    </a>
                </li>

                @if (auth()->user()->role === 'Admin')
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-calendar-alt"></i>
                            <span> Shift Calendar </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-user-plus"></i>
                            <span> Shift Management </span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Staff')
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-clipboard-alt"></i>
                            <span>Inventory & Stock</span>
                        </a>
                    </li>
                @endif

<<<<<<< Updated upstream
                @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'Staff')
                <li class="side-nav-item">
                <a href="{{ route('billing-payment.index') }}" class="side-nav-link">
                        <i class="uil-wallet"></i>
                        <span>billing and Payment</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role === 'Customer' || auth()->user()->role === 'Staff')
                <li class="side-nav-item">
                    <a href="{{ route('order.index') }}" class="side-nav-link">
                        <i class="uil-shopping-cart-alt"></i>
                        <span>Order List </span>
                    </a>
                </li>
=======
                @if (auth()->user()->role === 'Customer' || auth()->user()->role === 'Staff')
                    <li class="side-nav-item">
                        <a href="{{ route('order.index') }}" class="side-nav-link">
                            <i class="uil-shopping-cart-alt"></i>
                            <span>Order List </span>
                        </a>
                    </li>
>>>>>>> Stashed changes
                @endif

                @if (auth()->user()->role === 'Staff')
                    <li class="side-nav-item">
                        <a href="{{ route('laundry.index') }}" class="side-nav-link">
                            <i class="uil-cog"></i>
                            <span>Laundry Type & Service </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="#" class="side-nav-link">
                            <i class="uil-wallet"></i>
                            <span>Bill & Payment </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('delivery.index') }}" class="side-nav-link">
                            <i class="uil-truck"></i>
                            <span> Pickup & Delivery </span>
                        </a>
                    </li>
                @endif
            </ul>


            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @if (auth()->user()->role === 'Admin')
                <div class="navbar-custom" style="background-color:#9BCADD">
                @elseif(auth()->user()->role === 'Staff')
                    <div class="navbar-custom" style="background-color:#73C0BF">
                    @else
                        <div class="navbar-custom">
            @endif
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <!-- Mobile Menu Button -->
                <button class="button-menu-mobile open-left disable-btn">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- Logout Icon -->
                <div class="top d-flex align-items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            <i class="mdi mdi-logout text-dark" style="font-size: 1.4rem;"></i>
                        </x-dropdown-link>
                    </form>
                </div>

            </div>
        </div>
        <!-- End Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">
            @yield('content')
        </div> <!-- container -->
    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    MyHome Dobi ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- third party js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{ asset('assets/js/pages/demo.customers.js') }}"></script>
<!-- end demo js-->

<!-- Datatables js -->
<script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable Init js -->
<script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>

<script>
    function filterLaundryServices() {
        const selectedTypeId = document.getElementById('laundry_type_id').value;
        const serviceDropdown = document.getElementById('laundry_service_id');

        // Loop through options and show/hide based on data-type
        for (const option of serviceDropdown.options) {
            if (!option.dataset.type || option.dataset.type == selectedTypeId) {
                option.style.display = ''; // Show option
            } else {
                option.style.display = 'none'; // Hide option
            }
        }

        // Reset selection to the default placeholder
        serviceDropdown.value = '';
    }

    // Add event listener to the laundry type dropdown
    document.getElementById('laundry_type_id').addEventListener('change', filterLaundryServices);

    function toggleAddressForm() {
        const orderMethod = document.getElementById('order_method').value;
        const deliveryOption = document.getElementById('delivery_option').checked;
        const addressForm = document.getElementById('address_form');

        // Show address form if "Pickup" is selected or "Delivery Option" is checked
        addressForm.style.display = (orderMethod === 'Pickup' || deliveryOption) ? 'block' : 'none';
    }

    // Add event listeners for order method and delivery option
    document.getElementById('order_method').addEventListener('change', toggleAddressForm);
    document.getElementById('delivery_option').addEventListener('change', toggleAddressForm);
</script>

</body>

</html>
