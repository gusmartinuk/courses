<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <header class="py-3 mb-4 border-bottom shadow">
            <div class="container-fluid align-items-center d-flex">
                <div class="flex-shrink-1">
                    <a href="#"
                        class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none">
                        <i class="bi bi-bootstrap fs-2 text-dark"></i>
                    </a>
                </div>
                <div class="flex-grow-1 d-flex align-items-center">
                    <form class="w-100 me-3">
                        <input type="search" class="form-control" placeholder="Search...">
                    </form>
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/28?text=!" alt="user" width="32"
                                height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser2"
                            style="">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid pb-3 flex-grow-1 d-flex flex-column flex-sm-row overflow-auto">
            <div class="row flex-grow-sm-1 flex-grow-0">
                <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 sticky-top pb-sm-0 pb-3">
                    <div class="bg-light border rounded-3 p-1 h-100 sticky-top">
                        <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">
                            @yield('sidebar')
                            <li class="nav-item">
                                <a href="#" class="nav-link px-2 text-truncate">
                                    <i class="bi bi-house fs-5"></i>
                                    <span class="d-none d-sm-inline">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-2 text-truncate">
                                    <i class="bi bi-speedometer fs-5"></i>
                                    <span class="d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-2 text-truncate"><i
                                        class="bi bi-card-text fs-5"></i>
                                    <span class="d-none d-sm-inline">Orders</span> </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-bricks fs-5"></i>
                                    <span class="d-none d-sm-inline">Products</span> </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-2 text-truncate"><i class="bi bi-people fs-5"></i>
                                    <span class="d-none d-sm-inline">Customers</span> </a>
                            </li>
                        </ul>
                    </div>
                </aside>
                <main class="col overflow-auto h-100">
                    <div class="bg-light border rounded-3 p-3">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
