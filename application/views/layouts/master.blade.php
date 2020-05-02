<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ base_url() }}assets/css/bootstrap.min.css">
    <title>Resto App</title>
    <script src="{{ base_url() }}assets/js/Chart.bundle.min.js"></script>
</head>
<body>
    @php
    $CI = &get_instance();
    $role = $CI->session->userdata("admin");
    $login = $CI->session->userdata("logged_in");
    @endphp
    <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Resto App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                @if($login)
                    @if($role)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin/menu">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin/meja">Table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin/user">List User</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/transaksi">Transactions</a>
                    </li>
                @endif
            </ul>
            @if($login)
            <span class="navbar-text dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-dark" href="change-password">Setting</a>
                    <hr>
                    <a class="dropdown-item text-dark" href="/logout">Logout</a>
                </div>
            </span>
            @endif
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ base_url() }}assets/js/jquery3.3.1.min.js"></script>
    <script src="{{ base_url() }}assets/js/bootstrap.min.js"></script>

    @yield('script')
</body>
</html>