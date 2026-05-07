<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Acceso | Centro Deportivo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-lime-100 text-slate-800">
    <main class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-10 sm:px-6 lg:px-8">
        <div class="pointer-events-none absolute -left-20 top-8 h-72 w-72 rounded-full bg-emerald-200/40 blur-3xl"></div>
        <div class="pointer-events-none absolute bottom-0 right-0 h-80 w-80 rounded-full bg-lime-200/40 blur-3xl"></div>

        <div class="relative w-full max-w-md">
            <div class="mb-5 flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-emerald-700">Sports Center</p>
                </div>

                @yield('header-action')
            </div>

            <section class="rounded-3xl bg-white/90 p-6 shadow-2xl ring-1 ring-emerald-100 backdrop-blur sm:p-8">
                @yield('content')
            </section>
        </div>
    </main>
</body>
</html>