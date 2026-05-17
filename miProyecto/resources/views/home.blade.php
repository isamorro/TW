@extends('layouts.app')
@section('title', 'SportsCenter - Inicio')
@section('main-class', 'flex-grow w-full')

@push('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
@endpush

@section('content')

    <!-- 2. Seccion Hero -->
    <section class="relative h-screen flex items-center justify-center mt-10 md:mt-0">
        <!-- Imagen de fondo -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=2070&auto=format&fit=crop" alt="Gym training" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-charcoal/20"></div> <!-- Capa oscura ligera para contraste -->
        </div>

        <!-- Contenido -->
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <div class="glass-panel p-8 md:p-12 rounded-2xl shadow-2xl transition-transform duration-500 hover:scale-[1.02]">
                <h1 class="text-4xl md:text-6xl font-extrabold text-charcoal leading-tight mb-4 uppercase tracking-wide">
                    Entrena como <span class="text-brand">un atleta</span> con lo mejor del fitness
                </h1>
                <p class="text-lg md:text-xl text-charcoal-light font-medium mb-8 max-w-2xl mx-auto">
                    Equipamiento de última generación, entrenadores personales de élite y clases grupales motivadoras diseñadas para superar tus límites.
                </p>
                <a href="#clubs" class="inline-block bg-brand hover:bg-brand-hover text-white text-lg px-8 py-4 rounded-full font-bold transition-all duration-300 hover:scale-105 shadow-lg">
                    Encuentra tu club
                </a>
            </div>
        </div>
    </section>

    <!-- 3. Seccion "Nuestros Espacios" (Carrusel horizontal) -->
    <section id="spaces" class="py-24 pb-28 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-charcoal">Explora Nuestros <span class="text-brand">Espacios</span></h2>
                <p class="text-charcoal-light mt-4 font-medium">Descubre zonas especializadas adaptadas para tu máximo rendimiento.</p>
            </div>
            
            <!-- Carrusel Swiper -->
            <div class="swiper spaces-swiper pb-12! overflow-visible max-w-7xl mx-auto">
                <div class="swiper-wrapper ">
                    @forelse($installations as $installation)
                        <a href="{{ route('instalaciones') }}" class="swiper-slide h-auto block">
                            <article class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group h-full flex flex-col">
                                <div class="h-48 overflow-hidden relative">
                                    @if($installation->image_path)
                                        <img src="{{ asset($installation->image_path) }}" alt="{{ $installation->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                            <i class="fa-solid fa-dumbbell text-5xl text-brand"></i>
                                        </div>
                                    @endif
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-brand shadow-sm backdrop-blur">
                                            Disponible
                                        </span>
                                    </div>
                                </div>
                                <div class="p-6 flex flex-1 flex-col">
                                    <h3 class="text-xl font-bold text-charcoal mb-2">{{ $installation->name }}</h3>
                                    <p class="text-charcoal-light text-sm leading-relaxed flex-1">{{ $installation->description }}</p>
                                </div>
                            </article>
                        </a>
                    @empty
                        <div class="swiper-slide h-auto">
                            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 text-center h-full flex flex-col justify-center">
                                <i class="fa-solid fa-building text-4xl text-gray-300 mb-4"></i>
                                <h3 class="text-xl font-bold text-charcoal mb-2">No hay instalaciones disponibles</h3>
                                <p class="text-charcoal-light text-sm">Cuando existan registros en la base de datos aparecerán aquí automáticamente.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- 4. Seccion "Nuestros Clubes" (Grid vertical) Seccion Estatica -->
    <section id="clubs" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-charcoal mb-4">Encuentra un Club <span class="text-brand">Cerca de Ti</span></h2>
            <p class="text-charcoal-light font-medium mb-12">Ubicaciones premium en todas partes donde las necesites.</p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Tarjeta de club -->
                <a href="{{ route('register') }}" class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl flex flex-col h-96 group">
                    <div class="h-2/3 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1632247492667-b627d2edc4f6?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?q=80&w=2070&auto=format&fit=crop" alt="Cadiz" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-center items-center bg-white">
                        <h3 class="text-2xl font-extrabold text-charcoal mb-1">Cádiz</h3>
                        <div class="flex items-center text-brand font-semibold mb-2">
                            <i class="fa-solid fa-location-dot mr-2"></i>
                            <span class="text-sm bg-green-100 px-3 py-1 rounded-full text-brand">2 clubes disponibles</span>
                        </div>
                    </div>
                </a>
                <!-- Tarjeta de club -->
                <a href="{{ route('register') }}" class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl flex flex-col h-96 group">
                    <div class="h-2/3 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1617889546484-0ddbe676ed81?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?q=80&w=2020&auto=format&fit=crop" alt="Toledo" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-center items-center bg-white">
                        <h3 class="text-2xl font-extrabold text-charcoal mb-1">Toledo</h3>
                        <div class="flex items-center text-brand font-semibold mb-2">
                            <i class="fa-solid fa-location-dot mr-2"></i>
                            <span class="text-sm bg-green-100 px-3 py-1 rounded-full text-brand">1 clubes disponibles</span>
                        </div>
                    </div>
                </a>
                <!-- Tarjeta de club -->
                <a href="{{ route('register') }}" class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl flex flex-col h-96 group">
                    <div class="h-2/3 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1743244410824-339ef283da22?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?q=80&w=2070&auto=format&fit=crop" alt="New York" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-center items-center bg-white">
                        <h3 class="text-2xl font-extrabold text-charcoal mb-1">Granada</h3>
                        <div class="flex items-center text-brand font-semibold mb-2">
                            <i class="fa-solid fa-location-dot mr-2"></i>
                            <span class="text-sm bg-green-100 px-3 py-1 rounded-full text-brand">2 clubes disponibles</span>
                        </div>
                    </div>
                </a>
                <!-- Tarjeta de club -->
                <a href="{{ route('register') }}" class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl flex flex-col h-96 group">
                    <div class="h-2/3 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1654802966959-35be231117ae?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?q=80&w=1964&auto=format&fit=crop" alt="Tenerife" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-center items-center bg-white">
                        <h3 class="text-2xl font-extrabold text-charcoal mb-1">Tenerife</h3>
                        <div class="flex items-center text-brand font-semibold mb-2">
                            <i class="fa-solid fa-location-dot mr-2"></i>
                            <span class="text-sm bg-green-100 px-3 py-1 rounded-full text-brand">3 clubes disponibles</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. Seccion "App" (Banners asimetricos) -->
    <section id="app" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-green-50 rounded-3xl overflow-hidden shadow-xl flex flex-col md:flex-row items-center">
                <!-- Contenido izquierdo -->
                <div class="p-10 md:p-16 md:w-1/2 flex flex-col justify-center">
                    <span class="text-brand font-bold uppercase tracking-wider mb-2">Entrenamiento Inteligente</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-charcoal leading-tight mb-6">
                        Sigue tu progreso con nuestra <span class="text-brand">App</span>
                    </h2>
                    <p class="text-charcoal-light font-medium text-lg mb-4">
                        Obtén rutinas personalizadas, registra tus récords y sincroniza tus dispositivos. Actualiza a Premium para entrenamiento personalizado desde tu teléfono.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button
                            type="button"
                            disabled
                            class="flex items-center justify-center bg-brand text-white px-6 py-3 rounded-xl font-bold shadow-md opacity-70 cursor-not-allowed"
                            aria-label="App Store próximamente">
                            <i class="fa-brands fa-apple text-xl mr-2" aria-hidden="true"></i>
                            App Store próximamente
                        </button>

                        <button
                            type="button"
                            disabled
                            class="flex items-center justify-center bg-charcoal text-white px-6 py-3 rounded-xl font-bold shadow-md opacity-70 cursor-not-allowed"
                            aria-label="Google Play próximamente">
                            <i class="fa-brands fa-google-play text-xl mr-2" aria-hidden="true"></i>
                            Google Play próximamente
                        </button>
                    </div>
                </div>
                <!-- Imagen derecha -->
                <div class="md:w-1/2 h-64 md:h-auto w-full relative flex items-center justify-center p-8">
                    <!-- Marcador visual del mockup de la app -->
                    <div class="relative w-64 h-112 bg-white rounded-3xl shadow-2xl border-8 border-charcoal overflow-hidden transform rotate-3 hover:rotate-0 transition-transform duration-500">
                        <!-- UI del mockup de la app -->
                        <div class="h-20 bg-brand p-4 flex items-end">
                            <div class="w-3/4 h-4 bg-white/30 rounded"></div>
                        </div>
                        <div class="p-4 space-y-4">
                            <div class="w-full h-32 bg-gray-100 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-chart-line text-4xl text-brand"></i>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-1/2 h-24 bg-green-50 rounded-xl"></div>
                                <div class="w-1/2 h-24 bg-green-50 rounded-xl"></div>
                            </div>
                            <div class="w-full h-12 bg-charcoal rounded-xl flex items-center justify-center text-white text-sm font-bold">
                                INICIAR ENTRENAMIENTO
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Seccion Newsletter (Captacion) -->
    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border text-center border-gray-100 rounded-2xl shadow-xl p-10 md:p-14 transition-all duration-300 hover:shadow-2xl">
                <i class="fa-regular fa-envelope-open text-5xl text-brand mb-6"></i>
                <h2 class="text-3xl font-extrabold text-charcoal mb-4">¡No te pierdas lo último en fitness!</h2>
                <p class="text-charcoal-light font-medium mb-8">Suscríbete para recibir consejos, ofertas exclusivas y novedades sobre aperturas de nuevos clubes.</p>
                
                <form action="/register" class="flex flex-col sm:flex-row items-center justify-center gap-4 max-w-lg mx-auto">
                    <button type="submit" class="bg-brand hover:bg-brand-hover text-white px-8 py-4 rounded-xl font-bold transition-all duration-300 hover:scale-105 shadow-md whitespace-nowrap">
                        Suscribirse al club
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Efecto de scroll en el header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 10) {
                header.classList.add('shadow-md');
                header.classList.remove('shadow-sm');
            } else {
                header.classList.add('shadow-sm');
                header.classList.remove('shadow-md');
            }
        });

        // Inicializar Swiper para "Nuestros Espacios"
        const spacesSwiper = new Swiper('.spaces-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            }
        });
    </script>
@endpush