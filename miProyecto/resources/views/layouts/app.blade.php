<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Centro Deportivo')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- HEADER -->
    <header class="header">

        <div class="header-container">

            <!-- TITULO -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    SportCenter
                </a>
            </div>

            <!-- NAV -->
            <nav class="navbar">

                <a href="{{ route('home') }}">Inicio</a>
                <a href="{{ route('catalogo') }}">Catálogo</a>
                <a href="{{ route('instalaciones') }}">Instalaciones</a>
                <a href="{{ route('contacto') }}">Contacto</a>
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.panel') }}">Panel Admin</a>
                    @else
                    <a href="{{ route('reservas') }}">Reservas</a>
                    @endif
                @endauth

            </nav>
            <!-- AUTENTICACION -->
            <div class="auth-links">
                @auth
                    <a href="{{ route('profile') }}">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    <a href="{{ route('register') }}">Registrarse</a>
                @endauth

        </div>

    </header>

    <!-- CONTENIDO -->
    <main class="main-content">

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-container">

            <a href="{{ route('contacto') }}">
                Contacto
            </a>

            <p class="copyright">
                © {{ date('Y') }} SportCenter - Todos los derechos reservados
            </p>

        </div>

    </footer>

</body>

</html>