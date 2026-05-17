<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SportsCenter')</title>
    <link rel="icon" type="image/png" href="{{ asset('logos/logo-SportsCenter.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

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
                            DEFAULT: '#589337',
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-charcoal flex flex-col min-h-screen relative pt-20">
    <a href="#main-content"
    class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[9999] focus:bg-white focus:text-charcoal focus:px-4 focus:py-2 focus:rounded-lg focus:shadow">
        Saltar al contenido principal
    </a>

    <!-- HEADER -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-sm transition-all duration-300">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20 min-w-0">

                <!-- LOGO -->
                <div class="flex items-center cursor-pointer min-w-0">
                    <a href="{{ route('home') }}" class="flex items-center text-charcoal min-w-0">
                        <img src="{{ asset('logos/logo-SportsCenter.png') }}" alt="SportsCenter Logo" class="h-8 sm:h-9 w-auto mr-1 sm:mr-2 shrink-0">
                        <img src="{{ asset('logos/Icono-SportsCenter.png') }}" alt="SportsCenter Icon" class="hidden sm:block h-12 w-auto shrink-0">
                    </a>
                </div>

                <!-- NAV -->
                <nav class="hidden lg:flex space-x-6">
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
                <div class="hidden lg:flex items-center space-x-3">
                    @auth
                        <div class="text-right leading-tight">
                            <p class="font-bold text-charcoal">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-sm text-brand font-semibold">
                                {{ ucfirst(auth()->user()->role) }}
                            </p>
                        </div>

                        <a href="{{ route('profile') }}" class="text-charcoal font-semibold hover:text-brand transition-colors duration-300">
                            Perfil
                        </a>

                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="border-2 border-charcoal text-charcoal px-4 py-2 rounded-full font-bold hover:bg-charcoal hover:text-white transition-all duration-300">
                                Salir
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="border-2 border-gray-200 bg-white text-charcoal px-5 py-2.5 rounded-full font-bold transition-all duration-300 hover:border-brand hover:text-brand">
                            Acceder
                        </a>
                        <a href="{{ route('register') }}" class="bg-brand hover:bg-brand-hover text-white px-5 py-2.5 rounded-full font-bold transition-all duration-300 hover:scale-105 shadow-md">
                            Únete ahora
                        </a>
                    @endauth
                </div>

                <!-- BOTÓN MENÚ MÓVIL -->
                <div class="lg:hidden flex items-center shrink-0">

                    @auth
                        <div class="text-right mr-3 leading-tight">
                            <p class="text-sm font-bold text-charcoal">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="text-xs text-brand font-semibold">
                                {{ ucfirst(auth()->user()->role) }}
                            </p>
                        </div>
                    @endauth

                    <button id="mobile-menu-btn" type="button" aria-label="Abrir menú de navegación" aria-controls="mobile-menu" aria-expanded="false"
                        class="text-charcoal focus:outline-none hover:text-brand transition-colors">
                        <i class="fa-solid fa-bars text-2xl" aria-hidden="true"></i>
                    </button>

                </div>

            </div>
        </div>

        <!-- MENÚ MÓVIL DESPLEGABLE -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-md border-t border-gray-100 absolute w-full left-0 top-full">
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
    <main id="main-content" class="@yield('main-class', 'flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 overflow-visible')">

        @isset($activities)
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start overflow-visible">

                <!-- MENÚ MÓVIL ACTIVIDADES -->
                <div class="lg:hidden mb-6">
                    <button id="activities-toggle" type="button" aria-label="Mostrar u ocultar listado de actividades" aria-controls="activities-menu" aria-expanded="false"
                        class="w-full flex items-center justify-between bg-white rounded-xl shadow p-4 border">

                        <span class="flex items-center gap-3 text-lg font-semibold">
                            <i class="fa-solid fa-dumbbell text-brand" aria-hidden="true"></i>
                            Actividades
                        </span>

                        <i id="activities-arrow"
                           class="fa-solid fa-chevron-down transition-transform duration-300" aria-hidden="true"></i>
                    </button>

                    <div id="activities-menu"
                         class="hidden bg-white rounded-xl shadow p-4 border mt-3">

                        <ul class="space-y-2">
                            @foreach($activities as $activity)
                                <li>
                                    <a href="{{ route('activities.show', $activity) }}"
                                       class="block px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-300 text-gray-700">
                                        {{ $activity->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                <!-- MENÚ ESCRITORIO ACTIVIDADES -->
                <aside class="hidden lg:block lg:col-span-1 self-start sticky top-28">

                    <div class="bg-white rounded-xl shadow p-6 border">

                        <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-dumbbell text-brand" aria-hidden="true"></i>
                            Actividades
                        </h2>

                        <ul class="space-y-2">
                            @foreach($activities as $activity)
                                <li>
                                    <a href="{{ route('activities.show', $activity) }}"
                                       class="block px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-300 {{ request()->routeIs('activities.show') && request()->route('activity')?->id === $activity->id ? 'bg-gray-200 font-medium' : 'text-gray-700' }}">
                                        {{ $activity->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </aside>

                <section class="lg:col-span-3">
                    @yield('content')
                </section>

            </div>
        @else
            @yield('content')
        @endisset

    </main>

    <!-- FOOTER -->
    <footer class="bg-charcoal text-white pt-12 pb-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">

                <div class="flex items-center mb-6 md:mb-0">
                    <img src="{{ asset('logos/logo-SportsCenter.png') }}" alt="SportsCenter Logo" class="h-6 sm:h-9 md:h-12 w-auto mr-2 grayscale brightness-200">
                    <img src="{{ asset('logos/Icono-SportsCenter.png') }}" alt="SportsCenter Icon" class="h-10 sm:h-16 md:h-20 w-auto grayscale brightness-200">
                </div>

                <a href="{{ route('contacto') }}" class="text-white hover:text-green-300 transition-colors duration-300 font-medium">
                    Contacto
                </a>
            </div>

            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-200 text-sm md:text-center">
                    © {{ date('Y') }} SportsCenter - Todos los derechos reservados
                </p>
                <a href="#" class="text-white hover:text-green-300 transition-colors duration-300 text-sm mt-3 md:mt-0">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('activities-toggle');
            const menu = document.getElementById('activities-menu');
            const arrow = document.getElementById('activities-arrow');

            if (toggle && menu && arrow) {
                toggle.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-180');
                });
            }
        });
    </script>

    @stack('scripts')

</body>

</html>