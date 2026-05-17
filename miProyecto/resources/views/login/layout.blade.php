<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Acceso | SportsCenter')</title>
    <link rel="icon" type="image/png" href="{{ asset('logos/logo-SportsCenter.png') }}">
    
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
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-charcoal font-sans antialiased">
    
    <!-- Simple Header for login pages to return home -->
    <div class="fixed top-0 w-full p-6 z-50">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-200 hover:text-brand transition-colors w-fit">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="font-bold">Volver al inicio</span>
        </a>
    </div>

    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10 sm:px-6 lg:px-8 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=2070&auto=format&fit=crop');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-charcoal/70"></div>

        <div class="relative w-full max-w-md z-10">
            <div class="mb-8 text-center flex flex-col items-center">
                <div class="flex items-center mb-4 bg-white p-5 rounded-xl shadow-lg">
                    <img src="{{ asset('logos/Icono-SportsCenter.png') }}" alt="SportsCenter Icon" class="h-9 w-auto">                </div>
                @yield('header-action')
            </div>

            <section class="rounded-2xl bg-white/95 p-8 shadow-2xl backdrop-blur-md">
                @yield('content')
            </section>
        </div>
    </main>
</body>
</html>