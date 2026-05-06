<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Centro Deportivo')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- HEADER -->
    <header class="header">

        <div class="header-container">

            <!-- TITULO -->
            <div class="logo">
                <a href="/">
                    SportCenter
                </a>
            </div>

            <!-- NAV -->
            <nav class="navbar">

                <a href="/">Inicio</a>
                <a href="/catalogo">Catálogo</a>
                <a href="/instalaciones">Instalaciones</a>
                <a href="/usuario/reservas">Reservas</a>
                <a href="/contacto">Contacto</a>
            </nav>

        </div>

    </header>

    <!-- CONTENIDO -->
    <main class="main-content">

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-container">

            <a href="/contacto">
                Contacto
            </a>

            <p class="copyright">
                © {{ date('Y') }} SportCenter - Todos los derechos reservados
            </p>

        </div>

    </footer>

</body>

</html>