<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SilverStore.com</title>
    <base href="{{ asset('/') }}">
    <link rel="stylesheet" href="front/css/bootstrap.css">
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/all.css">
    <link rel="stylesheet" href="front/css/datatables.css">
    <style>
        .offcanvas-top.h-auto {
            bottom: initial;
        }
    </style>
</head>
<body>
<main class="d-flex flex-wrap flex-sm-nowrap">
    <!--Dropdowns-->
    <div class="d-flex flex-row justify-content-between justify-content-sm-start flex-sm-column flex-sm-shrink-0 bg-light border mb-sm-0 mb-4 flex-grow-1 flex-sm-grow-0">
        <a href="/" class="link-dark text-decoration-none">
            <div class="d-flex align-items-center p-3">
                <i class="fa-solid fa-shield-cat fs-3 pe-sm-0 pe-1"></i><span class="d-sm-none">SilverStore.com</span>
            </div>
        </a>
        <button type="button" class="navbar-toggler p-3 d-sm-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight" title="Expand">
            <i class="fa-solid fa-bars fs-3"></i>
        </button>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center d-none d-sm-flex">
            <li>
                <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }} py-3 border-bottom {{--border-top--}} rounded-0" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fa-solid fa-gauge-high fs-5"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('listOrders') }}" class="nav-link {{ Request::routeIs('listOrders') ? 'active' : '' }} py-3 border-bottom rounded-0" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fa-regular fa-file-lines fs-5"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('viewCategory') }}" class="nav-link {{ Request::routeIs('viewCategory') ? 'active' : '' }} py-3 border-bottom rounded-0" title="Categories" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fa-solid fa-table fs-5"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('listProducts') }}" class="nav-link {{ Request::routeIs('listProducts') ? 'active' : '' }} py-3 border-bottom rounded-0" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fa-solid fa-tablet-screen-button fs-5"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('viewUser') }}" class="nav-link {{ Request::routeIs('viewUser') ? 'active' : '' }} py-3 border-bottom rounded-0" title="Users" data-bs-toggle="tooltip" data-bs-placement="right">
                    <i class="fa-solid fa-user fs-5"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="nav-link py-3 border-bottom rounded-0" title="Log Out" data-bs-placement="right">
                    <i class="fa-solid fa-arrow-right-from-bracket fs-5"></i>
                </a>
            </li>
        </ul>
        <div class="offcanvas offcanvas-top h-auto" data-bs-scroll="true" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">
                    <a href="/" class="link-dark text-decoration-none"><i class="fa-solid fa-shield-cat fs-4 pe-1"></i>SilverStore.com</a>
                </h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'text-white active' : 'text-dark' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('listOrders') }}" class="nav-link {{ Request::routeIs('listOrders') ? 'text-white active' : 'text-dark' }}">
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('viewCategory') }}" class="nav-link {{ Request::routeIs('viewCategory') ? 'text-white active' : 'text-dark' }}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('listProducts') }}" class="nav-link {{ Request::routeIs('listProducts') ? 'text-white active' : 'text-dark' }}">
                            Products
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('viewNewProduct') }}" class="nav-link {{ Request::routeIs('viewNewProduct') ? 'text-white active' : 'text-secondary' }}">
                                    Add new Products
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('viewUser') }}" class="nav-link {{ Request::routeIs('viewUser') ? 'text-white active' : 'text-dark' }}">
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="nav-link text-dark">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Dropdowns-->

    <!--Modal Logout-->
    @include('dashboard.modal-logout')
    <!--End Modal Logout-->
    @include('dashboard.modal-delete')

    <div class="b-example-divider b-example-vr d-none d-sm-block"></div>

    <!--Body-->
    @yield('body')
    <!--End Body-->

</main>

<script src="front/js/jquery-3.6.4.js"></script>
<script src="front/js/bootstrap.bundle.js"></script>
<script src="front/js/datatables.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable( {
            @if (Request::routeIs('listProducts'))
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [0, 1, 9],
                }
            ],
            "language": {
                "decimal": ",",
                "thousands": "."
            },
            "order": [2, 'asc']
            @elseif (Request::routeIs('viewCategory'))
            "ordering": false
            @elseif (Request::routeIs('listOrders'))
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [0, 8],
                }
            ],
            "order": [1, 'asc']
            @elseif (Request::routeIs('viewUser'))
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [0],
                }
            ],
            "order": [4, 'asc']
            @endif
        } );
    });
</script>
</body>
</html>
