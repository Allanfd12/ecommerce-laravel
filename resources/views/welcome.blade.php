<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            /* fallback for old browsers */
            background: rgb(203, 17, 17);

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right,
                    rgb(203, 17, 17),
                    rgb(252, 37, 127));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgb(204, 28, 72), rgb(204, 47, 16));
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand text-light d-none d-sm-block d-lg-none d-md-none " href="#">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="35"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler justify-content-center" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav col-lg-5 col-xxl-4 mb-2 mb-lg-0 nav-justified">
                    <li class="nav-item d-none d-lg-block d-sm-nones d-md-block">
                        <a class="navbar-brand text-light" href="#">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="35"
                                class="d-inline-block align-text-top">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Minha conta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="app" class="fullheight gradient-custom">
        <router-view></router-view>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
