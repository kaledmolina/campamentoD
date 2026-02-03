<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVESTI2 - Campamento Juvenil 2026</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Cinzel:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        cinzel: ['Cinzel', 'serif'],
                    },
                    colors: {
                        // Paleta Dorada (Mantenida, combina perfecto con sepia)
                        gold: {
                            50: '#FBF7E6',
                            100: '#F5EBC4',
                            200: '#ECD58C',
                            300: '#E4BF55',
                            400: '#D4AF37', // Gold Base
                            500: '#BFA124',
                            600: '#997B14',
                            700: '#75590B',
                            800: '#564006',
                            900: '#3D2C03',
                        },
                        // Nueva Paleta "Vintage Luxury" (Basada en la imagen 16x9.jpg)
                        // Tonos cálidos, tierra profunda, café y bronce oscuro.
                        prestige: {
                            950: '#1a120b', // Deep Espresso/Black Brown (Fondo principal)
                            900: '#2b1d12', // Dark Mocha (Secciones alternas)
                            800: '#422d1e', // Dark Leather (Tarjetas)
                            700: '#5c402b', // Bronze Earth (Bordes suaves)
                            100: '#eaddcf', // Warm Cream (Textos claros)
                        }
                    },
                    animation: {
                        'pulse-glow': 'pulse-glow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                        'shine': 'shine 8s linear infinite',
                    },
                    keyframes: {
                        'pulse-glow': {
                            '0%, 100%': { opacity: 0.4, transform: 'scale(1)' },
                            '50%': { opacity: 0.8, transform: 'scale(1.05)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        shine: {
                            '0%': { backgroundPosition: '200% center' },
                            '100%': { backgroundPosition: '-200% center' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            /* Cambio principal de fondo: De azul a Café Profundo */
            background-color: #1a120b;
            color: #eaddcf;
            /* Texto crema cálido */
        }

        /* Ruido */
        .bg-grain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            opacity: 0.07;
            /* Un poco más visible para dar textura de papel viejo/film */
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            mix-blend-mode: overlay;
        }

        /* Glassmorphism Ajustado para Tonos Cálidos */
        .glass-premium {
            background: rgba(43, 29, 18, 0.6);
            /* Warm tint */
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(212, 175, 55, 0.15);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
        }

        .glass-premium:hover {
            border-color: rgba(212, 175, 55, 0.5);
            background: rgba(66, 45, 30, 0.7);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.15);
        }

        .text-gold-liquid {
            background: linear-gradient(to right, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            background-size: 200% auto;
            animation: shine 5s linear infinite;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a120b;
        }

        ::-webkit-scrollbar-thumb {
            background: #5c402b;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #D4AF37;
        }

        /* Navbar Scrolled Cálida */
        .nav-scrolled {
            background: rgba(26, 18, 11, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
            padding-top: 20px !important;
            padding-bottom: 20px !important;
        }

        .spotlight {
            position: absolute;
            width: 600px;
            height: 600px;
            /* Spotlight ahora es ámbar/dorado cálido en lugar de blanco/azul */
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, rgba(0, 0, 0, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            mix-blend-mode: screen;
        }
    </style>
</head>

<body class="font-montserrat antialiased selection:bg-gold-500 selection:text-white overflow-x-hidden">
    <div class="bg-grain"></div>

    <!-- NAVIGATION -->
    <nav id="navbar"
        class="fixed w-full z-50 transition-all duration-300 py-6 border-b border-white/5 bg-gradient-to-b from-prestige-950/90 to-transparent">
        <div class="container mx-auto px-8 flex justify-between items-center relative z-50">
            <!-- Logo Grande -->
            <a href="/" class="flex items-center gap-2 group md:absolute md:left-0">
                <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo"
                    class="h-16 md:h-32 transition-transform duration-300 group-hover:scale-105 filter drop-shadow-[0_0_15px_rgba(212,175,55,0.4)]">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-10 mx-auto">
                <a href="#inicio"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Inicio
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#invitados"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Invitados
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#Agenda"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Agenda
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#inversion"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Inversión
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/consulta"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Pagos
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center gap-4">
                <a href="/registro"
                    class="hidden md:inline-flex items-center justify-center bg-gold-500 hover:bg-prestige-100 text-prestige-950 hover:text-gold-600 font-black text-xs py-4 px-10 rounded shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_30px_rgba(255,255,255,0.4)] transform hover:-translate-y-1 transition duration-300 tracking-[0.2em] border border-gold-400">
                    INSCRIBIRME
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                    class="md:hidden w-12 h-12 flex items-center justify-center rounded bg-white/10 border border-white/20 text-gold-400 text-xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] bg-prestige-950/98 backdrop-blur-xl transform translate-x-full transition-transform duration-500 flex flex-col items-center justify-center space-y-10">
        <button id="close-menu-btn"
            class="absolute top-8 right-8 w-14 h-14 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-prestige-100/60 hover:text-white transition">
            <i class="fas fa-times text-2xl"></i>
        </button>

        <a href="#inicio" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Inicio</a>
        <a href="#invitados" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Invitados</a>
        <a href="#Agenda" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Agenda</a>
        <a href="#inversion" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Inversión</a>
        <a href="{{ route('consultation') }}" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Consulta</a>

        <a href="{{ route('registration') }}" onclick="toggleMenu()"
            class="mt-10 bg-gold-500 text-black font-bold py-5 px-14 rounded shadow-lg text-lg tracking-widest uppercase hover:bg-white hover:text-gold-600 transition-all">
            Inscribirme
        </a>
    </div>

    <!-- HERO SECTION -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-prestige-950">
        <!-- Dynamic Background -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/fondowebsite.png') }}"
                class="w-full h-full object-cover opacity-30 mix-blend-screen scale-105 animate-pulse-slow sepia-[0.5]"
                alt="Fondo">
            <!-- Gradients Lighter (Warm Tones) -->
            <div class="absolute inset-0 bg-gradient-to-b from-prestige-950/90 via-prestige-950/60 to-prestige-950">
            </div>
            <!-- Radial warmth instead of blue -->
            <div
                class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-gold-900/10 via-transparent to-transparent">
            </div>
        </div>

        <!-- Light Flares -->
        <div class="spotlight top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-50 blur-[100px]"></div>

        <!-- Content -->
        <div class="relative z-10 text-center px-4 max-w-7xl mx-auto flex flex-col items-center mt-20">

            <!-- Logos Distrito -->
            <div class="relative w-48 md:w-64 mx-auto mb-10 opacity-100" data-aos="fade-down" data-aos-duration="1000">
                <img src="{{ asset('images/logos_distrito.png') }}" alt="Logos Distrito"
                    class="w-full h-auto drop-shadow-lg">
            </div>

            <!-- Main Logo -->
            <div class="relative w-full max-w-5xl mx-auto -mb-16 z-20" data-aos="zoom-out" data-aos-duration="1500">
                <img src="{{ asset('images/camp_logo_2026.png') }}" alt="Campamento Juvenil 2026"
                    class="w-full h-full drop-shadow-[0_20px_60px_rgba(0,0,0,0.6)] animate-float-slow">
            </div>

            <!-- Countdown Timer -->
            <div data-aos="fade-up" data-aos-delay="500"
                class="mt-24 mb-14 bg-prestige-900/40 backdrop-blur-sm p-6 rounded-2xl border border-gold-500/10 shadow-lg">
                <div class="flex items-center justify-center gap-4 mb-6">
                    <div class="h-[1px] w-16 bg-gold-400"></div>
                    <p class="text-gold-300 font-montserrat text-xs tracking-[0.4em] uppercase font-bold text-shadow">
                        Tiempo Restante</p>
                    <div class="h-[1px] w-16 bg-gold-400"></div>
                </div>

                <div class="flex flex-wrap justify-center gap-6 md:gap-10" id="countdown">
                    <!-- JS Injected -->
                </div>
            </div>

            <!-- Buttons -->
            <div data-aos="fade-up" data-aos-delay="700"
                class="flex flex-col sm:flex-row justify-center items-center gap-8">
                <a href="{{ route('registration') }}"
                    class="relative group px-14 py-5 bg-transparent overflow-hidden rounded border border-gold-400 hover:border-gold-300 transition-colors">
                    <div
                        class="absolute inset-0 w-0 bg-gold-500/10 transition-all duration-[400ms] ease-out group-hover:w-full">
                    </div>
                    <span
                        class="relative z-10 text-gold-300 font-bold uppercase tracking-[0.3em] text-sm group-hover:text-white transition-all">
                        Reservar Cupo
                    </span>
                </a>

                <a href="https://wa.me/573113300389" target="_blank"
                    class="text-prestige-100/70 hover:text-white flex items-center gap-3 text-xs font-bold uppercase tracking-[0.2em] transition-all group">
                    <div
                        class="w-8 h-8 rounded-full bg-emerald-900/50 flex items-center justify-center border border-emerald-500/30 group-hover:border-emerald-500 transition-colors">
                        <i class="fab fa-whatsapp text-lg text-emerald-400"></i>
                    </div>
                    <span class="border-b border-transparent group-hover:border-white pb-0.5 transition-all">Más
                        Información</span>
                </a>
            </div>
        </div>
    </header>

    <!-- INTRO (Lighter Background but Warm) -->
    <div class="relative bg-prestige-900 py-32 overflow-hidden border-t border-white/5">
        <div class="spotlight top-0 left-0 -translate-x-1/2 -translate-y-1/2 bg-amber-500/5"></div>
        <div class="spotlight bottom-0 right-0 translate-x-1/2 translate-y-1/2 bg-gold-500/5"></div>

        <div class="container mx-auto px-8 relative z-10 w-full">
            <div class="flex flex-col lg:flex-row items-center gap-24 w-full max-w-[95rem] mx-auto">

                <!-- Text Content -->
                <div class="lg:w-1/2 text-left" data-aos="fade-right">
                    <div
                        class="inline-flex items-center gap-3 px-5 py-2 rounded-full border border-gold-500/30 bg-gold-500/5 text-gold-400 text-xs font-bold uppercase tracking-widest mb-8">
                        <i class="fas fa-scroll"></i> Manifiesto
                    </div>

                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-cinzel text-prestige-100 mb-10 leading-[1.1]">
                        ¿Qué es <br>
                        <span class="text-gold-liquid font-bold drop-shadow-lg">INVESTIDOS?</span>
                    </h2>

                    <p
                        class="text-xl text-prestige-100/80 leading-relaxed mb-10 font-light border-l-4 border-gold-500/40 pl-8">
                        No es solo un evento, es una <strong class="text-gold-200 font-medium">convocatoria
                            divina</strong>.
                        INVESTIDOS 2026 es el tiempo kairos en el que la juventud del Distrito 27 se reúne para recibir
                        el poder y la investidura de Dios. Una experiencia inmersiva de tres días diseñada para
                        transformar tu eternidad.
                    </p>
                </div>

                <!-- Video Card -->
                <div class="lg:w-1/2 w-full" data-aos="fade-left">
                    <div
                        class="relative p-3 rounded-xl bg-white/5 backdrop-blur-sm border border-gold-500/10 shadow-2xl">
                        <div class="relative rounded-lg overflow-hidden aspect-video shadow-inner bg-black">
                            <video
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-1000 ease-out"
                                controls preload="metadata" poster="{{ asset('images/investidobanner.png') }}">
                                <source src="{{ asset('images/video-caamp.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BANNER PARALLAX -->
    <div class="relative py-48 bg-fixed bg-center bg-cover border-y border-white/5"
        style="background-image: url('{{ asset('images/fondowebsite.png') }}');">
        <div class="absolute inset-0 bg-prestige-950/80 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-transparent to-prestige-950"></div>

        <div class="relative container mx-auto text-center px-4 max-w-5xl z-10">
            <div class="mb-10">
                <i class="fas fa-quote-left text-6xl text-gold-500/40"></i>
            </div>

            <h2 class="text-3xl md:text-5xl lg:text-6xl font-cinzel text-prestige-100 mb-10 leading-tight tracking-wide drop-shadow-xl"
                data-aos="zoom-in">
                "Pero quedaos vosotros en la ciudad de Jerusalén, hasta que seáis <span
                    class="text-gold-400 italic font-semibold border-b-2 border-gold-500/50 pb-1">
                    investidos de poder
                </span> desde lo alto..."
            </h2>

            <p class="text-gold-200/90 text-lg md:text-xl font-cinzel uppercase tracking-[0.3em] font-bold"
                data-aos="fade-up">Lucas 24:49</p>
        </div>
    </div>

    <!-- INVITADOS (Dark Sepia Background) -->
    <section id="invitados" class="py-32 relative bg-prestige-950">

        <div class="container mx-auto px-8 relative z-10">
            <div class="text-center mb-24">
                <span
                    class="text-gold-500 text-xs font-bold uppercase tracking-[0.4em] border-b border-gold-500/30 pb-2">Nuestros
                    Invitados</span>
                <h2 class="text-5xl md:text-7xl font-cinzel text-prestige-100 mt-6 mb-6">Expositores</h2>
                <p class="text-prestige-100/60 max-w-xl mx-auto font-light text-base tracking-wide">Instrumentos
                    escogidos por
                    Dios para impartir una
                    palabra que marcará a esta generación.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

                <!-- Card Template -->
                <div class="group relative h-[600px] overflow-hidden cursor-pointer bg-prestige-900 rounded-sm shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/5 hover:border-gold-500/30"
                    data-aos="fade-up">
                    <img src="{{ asset('images/jhonfabio.png') }}" alt="Pastor Jhon Fabio"
                        class="w-full h-full object-cover grayscale-[0.3] sepia-[0.3] group-hover:grayscale-0 group-hover:sepia-0 scale-100 group-hover:scale-105 transition-all duration-700 ease-out">

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-prestige-950/20 to-transparent opacity-90 transition-opacity duration-500">
                    </div>

                    <div class="absolute bottom-0 left-0 w-full p-10">
                        <div
                            class="h-1 w-12 bg-gold-500 mb-4 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Expositor</p>
                        <h3 class="text-4xl font-cinzel text-white leading-none">Jhon Fabio <br> García</h3>
                    </div>
                </div>

                <div class="group relative h-[600px] overflow-hidden cursor-pointer bg-prestige-900 rounded-sm shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/5 hover:border-gold-500/30"
                    data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('images/michaelalvarez.png') }}" alt="Pastor Michael Alvarez"
                        class="w-full h-full object-cover grayscale-[0.3] sepia-[0.3] group-hover:grayscale-0 group-hover:sepia-0 scale-100 group-hover:scale-105 transition-all duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-prestige-950/20 to-transparent opacity-90">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-10">
                        <div
                            class="h-1 w-12 bg-gold-500 mb-4 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Expositor</p>
                        <h3 class="text-4xl font-cinzel text-white leading-none">Michael <br> Alvarez</h3>
                    </div>
                </div>

                <div class="group relative h-[600px] overflow-hidden cursor-pointer bg-prestige-900 rounded-sm shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/5 hover:border-gold-500/30"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('images/juanpablo.png') }}" alt="Juan Pablo M."
                        class="w-full h-full object-cover grayscale-[0.3] sepia-[0.3] group-hover:grayscale-0 group-hover:sepia-0 scale-100 group-hover:scale-105 transition-all duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-prestige-950/20 to-transparent opacity-90">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-10">
                        <div
                            class="h-1 w-12 bg-gold-500 mb-4 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Adoración</p>
                        <h3 class="text-4xl font-cinzel text-white leading-none">Juan Pablo <br>Murillo</h3>
                    </div>
                </div>

                <div class="group relative h-[600px] overflow-hidden cursor-pointer bg-prestige-900 rounded-sm shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/5 hover:border-gold-500/30"
                    data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('images/coro.png') }}" alt="Coro"
                        class="w-full h-full object-cover grayscale-[0.3] sepia-[0.3] group-hover:grayscale-0 group-hover:sepia-0 scale-100 group-hover:scale-105 transition-all duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-prestige-950/20 to-transparent opacity-90">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-10">
                        <div
                            class="h-1 w-12 bg-gold-500 mb-4 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Alabanza</p>
                        <h3 class="text-4xl font-cinzel text-white leading-none">Coro <br> Distrito 27</h3>
                    </div>
                </div>

                <div class="group relative h-[600px] overflow-hidden cursor-pointer md:col-span-2 lg:col-span-2 bg-prestige-900 rounded-sm shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/5 hover:border-gold-500/30"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('images/conquistadores.png') }}" alt="Conquistadores"
                        class="w-full h-full object-cover object-top grayscale-[0.3] sepia-[0.3] group-hover:grayscale-0 group-hover:sepia-0 scale-100 group-hover:scale-105 transition-all duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-prestige-950 via-prestige-950/40 to-transparent opacity-90">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-10">
                        <div
                            class="h-1 w-12 bg-gold-500 mb-4 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                        </div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.3em] mb-2">Organizadores</p>
                        <h3 class="text-4xl font-cinzel text-white leading-none">Conquistadores <br> Pentecostales</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Agenda (Slightly Lighter Warm) -->
    <section id="Agenda" class="py-32 relative bg-prestige-900 overflow-hidden">
        <div class="absolute right-0 top-1/3 w-[600px] h-[600px] bg-amber-900/10 rounded-full blur-[150px]"></div>

        <div class="container mx-auto px-8 max-w-6xl relative z-10">
            <div class="flex flex-col items-center mb-24 text-center">
                <i class="fas fa-hourglass-half text-3xl text-gold-500 mb-6"></i>
                <h2 class="text-5xl md:text-7xl font-cinzel text-prestige-100">Agenda</h2>
                <div class="h-1 w-32 bg-gold-500/50 mt-8 mb-4 rounded-full"></div>
            </div>

            <div class="relative">
                <div class="absolute left-6 md:left-1/2 transform md:-translate-x-1/2 h-full w-[2px] bg-white/5"></div>

                <div class="space-y-24">

                    <!-- Sábado -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-20 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-3xl font-cinzel text-prestige-100 group-hover:text-gold-300 transition duration-300">
                                Sábado 16 Mayo</h3>
                            <span
                                class="text-gold-500 font-bold text-xs tracking-[0.3em] uppercase mb-4 block">Apertura</span>
                            <p class="text-prestige-100/60 font-light text-base leading-relaxed">Registro de
                                delegaciones y
                                servicio de apertura.</p>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-prestige-900 border-2 border-gold-500 rounded-full z-10 group-hover:bg-gold-500 group-hover:scale-150 transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-20 hidden md:block opacity-5 text-9xl font-black text-white font-cinzel"
                            data-aos="fade-left">01</div>
                    </div>

                    <!-- Domingo AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-20 hidden md:block opacity-5 text-9xl font-black text-white text-right font-cinzel"
                            data-aos="fade-right">02</div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-prestige-900 border-2 border-gold-500 rounded-full z-10 group-hover:bg-gold-500 group-hover:scale-150 transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-20 pl-20 w-full" data-aos="fade-left">
                            <h3
                                class="text-3xl font-cinzel text-prestige-100 group-hover:text-gold-300 transition duration-300">
                                Domingo - 8:00 AM</h3>
                            <span class="text-gold-500 font-bold text-xs tracking-[0.3em] uppercase mb-4 block">Mañana
                                de Gloria</span>
                            <p class="text-prestige-100/60 font-light text-base leading-relaxed">Devocional General,
                                Culto de
                                avivamiento y taller.</p>
                        </div>
                    </div>

                    <!-- Domingo PM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-20 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-3xl font-cinzel text-prestige-100 group-hover:text-gold-300 transition duration-300">
                                Domingo - 2:00 PM</h3>
                            <span
                                class="text-gold-500 font-bold text-xs tracking-[0.3em] uppercase mb-4 block">Actividades</span>
                            <p class="text-prestige-100/60 font-light text-base leading-relaxed">Esparcimiento, desafíos
                                dirigidos y campeonatos.</p>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-prestige-900 border-2 border-gold-500 rounded-full z-10 group-hover:bg-gold-500 group-hover:scale-150 transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-20 hidden md:block opacity-5 text-9xl font-black text-white font-cinzel"
                            data-aos="fade-left">03</div>
                    </div>

                    <!-- Domingo Noche -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group py-6">
                        <div class="md:w-1/2 md:pr-20 hidden md:block text-right" data-aos="fade-right">
                            <i class="fas fa-fire text-5xl text-gold-500 animate-pulse-glow"></i>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-8 h-8 bg-gold-500 rounded-full border-4 border-prestige-900 z-20 shadow-[0_0_40px_rgba(212,175,55,0.8)]">
                        </div>
                        <div class="md:w-1/2 md:pl-20 pl-20 w-full" data-aos="fade-left">
                            <h3 class="text-4xl font-cinzel text-gold-liquid font-bold">NOCHE DE INVESTIDURA</h3>
                            <span
                                class="text-prestige-100 font-bold text-xs tracking-[0.3em] uppercase mb-4 block">Domingo
                                -
                                7:00 PM</span>
                            <p
                                class="text-prestige-100/80 font-light text-base leading-relaxed border-l-4 border-gold-500 pl-6">
                                Adoración, culto de restauración y renovación espiritual.</p>
                        </div>
                    </div>

                    <!-- Lunes AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-20 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-3xl font-cinzel text-prestige-100 group-hover:text-gold-300 transition duration-300">
                                Lunes - 8:00 AM</h3>
                            <span class="text-gold-500 font-bold text-xs tracking-[0.3em] uppercase mb-4 block">Cierre y
                                Santa Cena</span>
                            <p class="text-prestige-100/60 font-light text-base leading-relaxed">Adoración y Servicio de
                                clausura.</p>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-prestige-900 border-2 border-gold-500 rounded-full z-10 group-hover:bg-gold-500 group-hover:scale-150 transition-all duration-300 shadow-[0_0_20px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-20 hidden md:block opacity-5 text-9xl font-black text-white font-cinzel"
                            data-aos="fade-left">04</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- INVERSION -->
    <section id="inversion" class="py-32 relative bg-prestige-950 overflow-hidden">
        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-prestige-900/50 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-20">
                <span class="text-prestige-100/60 uppercase tracking-[0.3em] text-xs font-bold">Reserva tu lugar</span>
                <h2 class="text-5xl md:text-7xl font-cinzel text-prestige-100 mt-4">Planes de Inversión</h2>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center gap-12 max-w-6xl mx-auto">

                <!-- Plan Parcial -->
                <div class="w-full lg:w-5/12 glass-premium rounded-xl p-10 hover:-translate-y-2 transition duration-500 relative group"
                    data-aos="fade-up">
                    <div class="text-center mb-10">
                        <h3
                            class="text-lg font-montserrat text-prestige-100/90 uppercase tracking-[0.2em] font-semibold">
                            Estadía Parcial</h3>
                        <div class="flex justify-center items-baseline gap-2 mt-6">
                            <span class="text-2xl text-gold-500">$</span>
                            <span class="text-6xl font-cinzel text-white tracking-tight font-bold">
                                @if(class_exists('App\Models\GlobalSetting'))
                                    {{ number_format(\App\Models\GlobalSetting::get('partial_stay_cost', 120000), 0) }}
                                @else
                                    120.000
                                @endif
                            </span>
                        </div>
                        <p class="text-xs text-prestige-100/50 mt-2 uppercase tracking-widest">Un solo día</p>
                    </div>

                    <ul class="space-y-6 mb-12 text-prestige-100/80 text-sm font-medium px-4">
                        <li class="flex items-center gap-4"><i class="fas fa-check-circle text-gold-500"></i> Entrada a
                            conferencias</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check-circle text-gold-500"></i> Material
                            de apoyo</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check-circle text-gold-500"></i> Almuerzo y
                            cena (1 día)</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check-circle text-gold-500"></i> Tarde de
                            esparcimiento</li>
                    </ul>

                    <a href="{{ route('registration') }}"
                        class="block w-full py-5 border-2 border-white/10 hover:border-gold-500 hover:bg-gold-500/10 rounded-lg text-center text-prestige-100/80 hover:text-white transition uppercase text-xs tracking-[0.3em] font-bold">
                        Seleccionar
                    </a>
                </div>

                <!-- Plan Full -->
                <div class="w-full lg:w-6/12 relative group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute -inset-1 bg-gradient-to-b from-gold-400 via-gold-600 to-transparent rounded-2xl opacity-30 blur-md group-hover:opacity-50 transition duration-500">
                    </div>

                    <div
                        class="relative bg-prestige-800 border border-gold-500/30 rounded-xl p-12 overflow-hidden h-full shadow-2xl">

                        <div class="absolute top-0 right-0 w-32 h-32 bg-gold-500/10 rounded-bl-full"></div>

                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 bg-gold-500 text-black text-[10px] font-black uppercase tracking-[0.3em] px-8 py-2 rounded-b-lg shadow-lg">
                            Recomendado
                        </div>

                        <div class="text-center mb-12 mt-8">
                            <h3 class="text-2xl font-cinzel text-gold-300 uppercase tracking-widest">Investidura Total
                            </h3>
                            <div class="flex justify-center items-baseline gap-2 mt-6">
                                <span class="text-3xl text-gold-500">$</span>
                                <span class="text-8xl font-cinzel text-white tracking-tight drop-shadow-xl font-bold">
                                    @if(class_exists('App\Models\GlobalSetting'))
                                        {{ number_format(\App\Models\GlobalSetting::get('default_total_cost', 300000), 0) }}
                                    @else
                                        300.000
                                    @endif
                                </span>
                            </div>
                            <p class="text-xs font-bold text-prestige-100/50 mt-4 uppercase tracking-[0.3em]">
                                Experiencia
                                Completa</p>
                        </div>

                        <div class="space-y-6 mb-12 pl-8 border-l-2 border-gold-500/20 ml-4">
                            <div class="flex items-start gap-5">
                                <i class="fas fa-check-circle text-gold-400 mt-1"></i>
                                <div>
                                    <h4 class="text-white font-bold text-base uppercase tracking-wide">Acceso Total 3
                                        Días</h4>
                                    <p class="text-prestige-100/60 text-sm mt-1">Todas las plenarias y talleres.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-5">
                                <i class="fas fa-check-circle text-gold-400 mt-1"></i>
                                <div>
                                    <h4 class="text-white font-bold text-base uppercase tracking-wide">Hospedaje en
                                        Cabaña</h4>
                                    <p class="text-prestige-100/60 text-sm mt-1">Alojamiento cómodo incluido.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-5">
                                <i class="fas fa-check-circle text-gold-400 mt-1"></i>
                                <div>
                                    <h4 class="text-white font-bold text-base uppercase tracking-wide">Alimentación
                                        Completa</h4>
                                    <p class="text-prestige-100/60 text-sm mt-1">Desde el sábado hasta el lunes.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-5">
                                <i class="fas fa-star text-gold-400 mt-1"></i>
                                <span class="text-gold-200 text-base font-bold uppercase tracking-wide">Kit de
                                    Bienvenida Premium</span>
                            </div>
                        </div>

                        <a href="{{ route('registration') }}"
                            class="block w-full py-6 bg-gold-500 hover:bg-gold-400 rounded-lg text-center text-black font-black uppercase text-xs tracking-[0.3em] shadow-lg transition-all transform hover:-translate-y-1">
                            Inscribirme Ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-prestige-950 pt-24 pb-12 border-t border-white/10 relative overflow-hidden">

        <div class="container mx-auto px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start gap-16">

                <div class="md:w-1/3">
                    <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco" class="h-14 mb-8 opacity-80">
                    <p class="text-prestige-100/60 text-sm leading-relaxed font-light tracking-wide uppercase">
                        Campamento Juvenil 2026.<br>
                        Distrito 27 - Iglesia Pentecostal Unida de Colombia.
                    </p>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-gold-400 font-cinzel font-bold mb-8 text-xl">Contacto</h3>
                    <ul class="space-y-5 text-prestige-100/80 text-sm font-medium">
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-gold-500">
                                <i class="fas fa-phone"></i>
                            </div>
                            <span class="tracking-wider">311 330 0389</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-gold-500">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <span class="tracking-wider">313 277 7477</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center text-gold-500">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="tracking-wider">conquistadoresdt27@gmail.com</span>
                        </li>
                    </ul>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-gold-400 font-cinzel font-bold mb-8 text-xl">Síguenos</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/share/17yXzxdwEL/" target="_blank"
                            class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-prestige-100/60 hover:bg-blue-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/conquistadoresd27" target="_blank"
                            class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-prestige-100/60 hover:bg-pink-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@conquistadorespentecostawy8tm" target="_blank"
                            class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-prestige-100/60 hover:bg-red-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://whatsapp.com/channel/0029Vb29KYMDDmFP0H0gWs2x" target="_blank"
                            class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-prestige-100/60 hover:bg-green-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-white/10 mt-20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-prestige-100/40 uppercase tracking-widest">
                <p>&copy; 2026 Conquistadores Pentecostales Distrito 27.</p>
                <p>Desarrollado por <a href="https://wa.me/573004200048"
                        class="text-gold-500 hover:text-white transition">Kaled Molina</a></p>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100,
            duration: 1000,
            easing: 'ease-out-cubic',
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function () {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('nav-scrolled');
            } else {
                nav.classList.remove('nav-scrolled');
            }
        });

        // Countdown Logic
        const targetDate = new Date("2026-05-16T08:00:00-05:00").getTime();
        const countdownInterval = setInterval(function () {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "<span class='text-gold-500 font-cinzel font-bold text-2xl animate-pulse'>¡EL TIEMPO HA LLEGADO!</span>";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Time Box Design (Clean & Large)
            const timeBoxClass = "flex flex-col items-center justify-center";
            const numberClass = "text-5xl md:text-7xl font-cinzel font-black text-white leading-none drop-shadow-2xl";
            const labelClass = "text-[10px] md:text-xs text-gold-400 uppercase tracking-[0.3em] font-bold mt-4";

            document.getElementById("countdown").innerHTML = `
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${days}</span>
                    <span class="${labelClass}">Días</span>
                </div>
                <div class="text-4xl text-gold-500/30 pt-4">:</div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${hours}</span>
                    <span class="${labelClass}">Hrs</span>
                </div>
                <div class="text-4xl text-gold-500/30 pt-4">:</div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${minutes}</span>
                    <span class="${labelClass}">Min</span>
                </div>
                <div class="text-4xl text-gold-500/30 pt-4">:</div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${seconds}</span>
                    <span class="${labelClass}">Seg</span>
                </div>
            `;
        }, 1000);

        // Mobile Menu
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            const body = document.body;

            if (menu.classList.contains('translate-x-full')) {
                menu.classList.remove('translate-x-full');
                body.style.overflow = 'hidden';
            } else {
                menu.classList.add('translate-x-full');
                body.style.overflow = 'auto';
            }
        }

        document.getElementById('mobile-menu-btn').addEventListener('click', toggleMenu);
        document.getElementById('close-menu-btn').addEventListener('click', toggleMenu);
    </script>
</body>

</html>