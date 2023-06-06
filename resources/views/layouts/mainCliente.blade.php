<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- css mine --}}
    {{-- <link rel="stylesheet" href="/css/mio.css"> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Navigation -->
        <div class="container-fluid">

            <nav id="sidebar-wrapper" class="active pt-5">
                <a href="#" class="img logo rounded-circle mb-5"
                    style="background-image: url(images/calisoft.png);background-size: contain;"></a>
                <div class="container">
                    <ul id="sidebarMenu" class="px-4 pt-4">
                        <li class="list-group-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <hr class="hr hr-blurry" style="color: aliceblue" />
                        <li class="list-group-item">
                            <a href="{{ route('entidades.mostrar') }}">Entidades</a>
                        </li>
                        <hr class="hr hr-blurry" style="color: aliceblue" />
                        <li class="list-group-item">
                            <a href="#">Home</a>
                        </li>
                        <hr class="hr hr-blurry" style="color: aliceblue" />
                        <li class="list-group-item">
                            <a href="#">Home</a>
                        </li>
                        <hr class="hr hr-blurry" style="color: aliceblue" />
                        <li class="list-group-item">
                            <a href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>

        <!-- main -->
        <div class="container-fluid padding" id="contentCliente">
            <div class="row px-5">
                <nav id="navbarCliente" class="navbar navbar-expand-lg sticky-top mt-3">
                    <div class="container-fluid">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li>
                                <a href="#" class="btn btn-primary toggle" id="menu-toggle" {{-- data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" --}}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>

                    </div>
                </nav>
                <main class="py-4">
                    @yield('content')
                </main>
            </div>


        </div>

        <!-- jQuery -->
        <!-- Bootstrap Core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script>
            // Closes the sidebar menu
            /*  $("#menu-close").click(function(e) {
                 e.preventDefault();
                 $("#sidebar-wrapper").toggleClass("active");

                 if ($("#sidebar-wrapper").hasClass("active")) {
                     $("#contentCliente").toggleClass("noPadding");
                 } else {
                     $("#contentCliente").toggleClass("noPadding");
                 }

             }); */

            // Opens the sidebar menu
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#sidebar-wrapper").toggleClass("active");

                if ($("#sidebar-wrapper").hasClass("active")) {
                    $("#contentCliente").toggleClass("noPadding");
                } else {
                    $("#contentCliente").toggleClass("noPadding");
                }
            });
        </script>
    </div>
</body>

</html>
