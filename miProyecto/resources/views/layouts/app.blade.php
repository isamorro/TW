<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Centro Deportivo') | SportsCenter</title>
    <link rel="icon" type="image/png" href="{{ asset('logo-sportsCenter.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            DEFAULT: '#589337', // Accent Green
                            hover: '#4A7D2F',
                        },
                        charcoal: {
                            DEFAULT: '#111827',
                            light: '#4B5563',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-charcoal flex flex-col min-h-screen relative pt-20">

    <!-- HEADER -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-sm transition-all duration-300">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 min-w-0">

            <!-- LOGO -->
            <div class="flex items-center cursor-pointer min-w-0">
                <a href="{{ route('home') }}" class="flex items-center text-charcoal min-w-0">
                <img src="{{ asset('logo-sportsCenter.png') }}" alt="SportsCenter Logo" class="h-8 sm:h-9 w-auto mr-1 sm:mr-2 shrink-0">
                <img src="{{ asset('icono-sportsCenter.png') }}" alt="SportsCenter Icon" class="hidden sm:block h-12 w-auto shrink-0">
                </a>
            </div>

            <!-- NAV -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Inicio</a>
                <a href="{{ route('catalogo') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Catálogo</a>
                <a href="{{ route('instalaciones') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Instalaciones</a>
                <a href="{{ route('contacto') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Contacto</a>
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.panel') }}" class="text-brand font-semibold hover:text-brand-hover transition-colors duration-300">Panel Admin</a>
                    @else
                    <a href="{{ route('reservas') }}" class="text-brand font-semibold hover:text-brand-hover transition-colors duration-300">Reservas</a>
                    @endif
                @endauth

            </nav>

            <!-- AUTENTICACION -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <a href="{{ route('profile') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="border-2 border-charcoal text-charcoal px-4 py-2 rounded-full font-bold hover:bg-charcoal hover:text-white transition-all duration-300">Salir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="border-2 border-gray-200 bg-white text-charcoal px-5 py-2.5 rounded-full font-bold transition-all duration-300 hover:border-brand hover:text-brand">Acceder</a>
                    <a href="{{ route('register') }}" class="bg-brand hover:bg-brand-hover text-white px-5 py-2.5 rounded-full font-bold transition-all duration-300 hover:scale-105 shadow-md">Únete ahora</a>
                @endauth
            </div>

            <!-- BOTÓN MENÚ MÓVIL -->
            <div class="md:hidden flex items-center shrink-0">
                <button id="mobile-menu-btn" class="text-charcoal focus:outline-none hover:text-brand transition-colors">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>

            </div>
        </div>

        <!-- MENÚ MÓVIL DESPLEGABLE -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md border-t border-gray-100 absolute w-full left-0 top-full">
            <nav class="flex flex-col px-6 pt-4 pb-6 space-y-4">
                <a href="{{ route('home') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Inicio</a>
                <a href="{{ route('catalogo') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Catálogo</a>
                <a href="{{ route('instalaciones') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Instalaciones</a>
                <a href="{{ route('contacto') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Contacto</a>
                
                @auth
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.panel') }}" class="text-brand font-semibold hover:text-brand-hover transition-colors duration-300">Panel Admin</a>
                    @else
                        <a href="{{ route('reservas') }}" class="text-brand font-semibold hover:text-brand-hover transition-colors duration-300">Reservas</a>
                    @endif
                    <hr class="border-gray-200 my-2">
                    <a href="{{ route('profile') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-charcoal font-semibold hover:text-brand transition-colors duration-300">Salir</button>
                    </form>
                @else
                    <hr class="border-gray-200 my-2">
                    <a href="{{ route('login') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">Acceder</a>
                    <a href="{{ route('register') }}" class="inline-block bg-brand hover:bg-brand-hover text-white px-5 py-2.5 rounded-full font-bold transition-all text-center mt-2">Únete ahora</a>
                @endauth
            </nav>
        </div>

    </header>

    <!-- CONTENIDO -->
    <main class="@yield('main-class', 'flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10')">

        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="bg-charcoal text-white pt-12 pb-8 mt-auto">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <!-- Logo Footer -->
                <div class="flex items-center mb-6 md:mb-0">
                    <img src="{{ asset('logo-sportsCenter.png') }}" alt="SportsCenter Logo" class="h-6 sm:h-9 md:h-12 w-auto mr-2 grayscale brightness-200">
                    <img src="{{ asset('icono-sportsCenter.png') }}" alt="SportsCenter Icon" class="h-10 sm:h-16 md:h-20 w-auto grayscale brightness-200">

                </div>
                
                <a href="{{ route('contacto') }}" class="text-gray-300 hover:text-brand transition-colors duration-300 font-medium">
                    Contacta con nosotros
                </a>
            </div>

            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-400 text-sm md:text-center">
                    © {{ date('Y') }} SportsCenter - Todos los derechos reservados
                </p>
                <a href="#" class="text-gray-300 hover:text-brand transition-colors duration-300 text-sm mt-3 md:mt-0">
                    Cómo se hizo
                </a>
            </div>

        </div>

    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
    @stack('scripts')

</body>

</html>