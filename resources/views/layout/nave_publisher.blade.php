<html>
    <head>
        <title>
            @yield('title')
        </title>
        @vite(['resources/sass/app.scss','resources/js/app.js'])
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
            <div class="container">
            <!-- Navbar brand -->
                <img
                    src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                    height="16"
                    alt="MDB Logo"
                    loading="lazy"
                    style="margin-top: -1px;"
                />
                <!-- Toggle button -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarButtonsExample"
                    aria-controls="navbarButtonsExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">logout</a>
                        </li>
                        <li class="nav-item">
                            @yield('m')
                        </li>
                    </ul>
                </div>
            </div>
        <!-- Collapsible wrapper -->
        </div>
    <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
        @yield('body')
    </body>
</html>
