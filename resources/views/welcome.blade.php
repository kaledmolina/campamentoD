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
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&family=Cinzel:wght@400;600;700;900&display=swap"
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
                        gold: {
                            100: '#F9F1D8',
                            300: '#EEDC82',
                            400: '#D4AF37',
                            500: '#C5A028',
                            600: '#A3841F',
                            900: '#423406',
                        },
                        dark: {
                            900: '#050505',
                            800: '#0A0A0A',
                            700: '#121212',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 3s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 10px rgba(212, 175, 55, 0.2)' },
                            '100%': { boxShadow: '0 0 25px rgba(212, 175, 55, 0.6)' }
                        }
                    },
                    backgroundImage: {
                        'radial-glow': 'radial-gradient(circle at center, var(--tw-gradient-stops))',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #050505;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Ruido de fondo sutil para textura */
        .bg-noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
            opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        /* Glassmorphism Premium */
        .glass-panel {
            background: rgba(20, 20, 20, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.36);
        }

        .glass-card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card-hover:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(212, 175, 55, 0.4);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px -10px rgba(212, 175, 55, 0.15);
        }

        /* Textos Dorados Premium */
        .text-gold-gradient {
            background: linear-gradient(135deg, #F9F1D8 0%, #D4AF37 50%, #A3841F 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 10px rgba(212, 175, 55, 0.2);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }

        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #D4AF37;
        }

        .nav-scrolled {
            background-color: rgba(5, 5, 5, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 15px !important;
            padding-bottom: 15px !important;
        }

        /* Efecto de luz ambiental */
        .ambient-light {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>

<body class="font-montserrat antialiased selection:bg-gold-500 selection:text-black bg-dark-900 relative">
    <div class="bg-noise"></div>

    <!-- NAVIGATION -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-6 border-b border-transparent">
        <div class="container mx-auto px-6 flex justify-between items-center relative z-50">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 group">
                <img src="{{ asset('images/INVESTIDOS.png') }}" alt="Logo"
                    class="h-10 md:h-14 transition-transform duration-300 group-hover:scale-105 filter drop-shadow-[0_0_15px_rgba(212,175,55,0.3)]">
            </a>

            <!-- Desktop Menu -->
            <div
                class="hidden md:flex space-x-1 items-center bg-black/30 backdrop-blur-md px-2 py-1.5 rounded-full border border-white/5 shadow-2xl">
                <a href="#inicio"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Inicio</a>
                <a href="#invitados"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Invitados</a>
                <a href="#cronograma"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Agenda</a>
                <a href="#inversion"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Inversión</a>
                <a href="/consulta"
                    class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-gray-300 hover:text-white hover:bg-white/10 transition-all duration-300">Pagos</a>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center gap-4">
                <a href="/registro"
                    class="hidden md:inline-flex items-center justify-center bg-gradient-to-r from-gold-400 to-gold-600 text-black font-black text-xs py-3 px-8 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] hover:shadow-[0_0_30px_rgba(212,175,55,0.6)] transform hover:-translate-y-1 transition duration-300 tracking-wider">
                    INSCRIBIRME
                    <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                    class="md:hidden w-10 h-10 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-gold-400">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] bg-dark-900/95 backdrop-blur-xl transform translate-x-full transition-transform duration-500 flex flex-col items-center justify-center space-y-8">
        <button id="close-menu-btn"
            class="absolute top-6 right-6 w-12 h-12 flex items-center justify-center rounded-full bg-white/5 text-gray-400 hover:text-white">
            <i class="fas fa-times text-xl"></i>
        </button>

        <a href="#inicio" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-white hover:text-gold-400 transition-colors">Inicio</a>
        <a href="#invitados" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-white hover:text-gold-400 transition-colors">Invitados</a>
        <a href="#cronograma" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-white hover:text-gold-400 transition-colors">Agenda</a>
        <a href="#inversion" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-white hover:text-gold-400 transition-colors">Inversión</a>
        <a href="{{ route('consultation') }}" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-white hover:text-gold-400 transition-colors">Consulta</a>

        <a href="{{ route('registration') }}" onclick="toggleMenu()"
            class="mt-8 bg-gold-500 text-black font-bold py-4 px-10 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)] tracking-widest uppercase">
            Inscribirme
        </a>
    </div>

    <!-- HERO SECTION -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Dynamic Background -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/fondowebsite.png') }}"
                class="w-full h-full object-cover opacity-60 scale-105 animate-pulse-slow" alt="Fondo">
            <div class="absolute inset-0 bg-gradient-to-b from-dark-900 via-transparent to-dark-900"></div>
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <!-- Glow Effects -->
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gold-500/10 rounded-full blur-[120px] pointer-events-none">
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center px-4 max-w-6xl mx-auto flex flex-col items-center mt-10">

            <!-- Logos Distrito Image -->
            <div class="relative w-48 md:w-64 mx-auto mb-6 opacity-80 mix-blend-screen" data-aos="fade-down"
                data-aos-duration="1000">
                <img src="{{ asset('images/logos_distrito.png') }}" alt="Logos Distrito" class="w-full h-auto">
            </div>

            <!-- Main Logo -->
            <div class="relative w-full max-w-3xl mx-auto -mb-10 z-20" data-aos="zoom-out" data-aos-duration="1500">
                <img src="{{ asset('images/camp_logo_2026.png') }}" alt="Campamento Juvenil 2026"
                    class="w-full h-auto drop-shadow-[0_0_50px_rgba(212,175,55,0.3)] hover:drop-shadow-[0_0_70px_rgba(212,175,55,0.5)] transition-all duration-700 animate-float">
            </div>

            <!-- Countdown Timer -->
            <div data-aos="fade-up" data-aos-delay="500" class="mt-8 mb-10">
                <p class="text-gold-400 font-cinzel text-xs tracking-[0.4em] uppercase mb-4 font-bold">Tiempo Restante
                </p>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6" id="countdown">
                    <!-- JS Injected -->
                </div>
            </div>

            <!-- Buttons -->
            <div data-aos="fade-up" data-aos-delay="700"
                class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <a href="{{ route('registration') }}"
                    class="relative group px-10 py-4 bg-transparent overflow-hidden rounded-full border border-gold-500/50">
                    <div
                        class="absolute inset-0 w-0 bg-gold-500 transition-all duration-[250ms] ease-out group-hover:w-full opacity-10">
                    </div>
                    <div
                        class="absolute inset-0 w-full h-full bg-gold-500/20 blur-xl group-hover:bg-gold-500/40 transition-all">
                    </div>
                    <span
                        class="relative z-10 text-gold-300 font-bold uppercase tracking-[0.2em] text-sm group-hover:text-white transition-colors">Reservar
                        Cupo</span>
                </a>

                <a href="https://wa.me/573113300389" target="_blank"
                    class="text-gray-400 hover:text-white flex items-center gap-3 text-xs uppercase tracking-[0.2em] transition-all border-b border-transparent hover:border-gold-500 pb-1">
                    <i class="fab fa-whatsapp text-lg text-green-500"></i> Información
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 animate-bounce z-20 opacity-50">
            <div class="w-[1px] h-16 bg-gradient-to-b from-transparent via-gold-500 to-transparent"></div>
        </div>
    </header>

    <!-- INTRO & VIDEO WRAPPER (Deep Dark Background) -->
    <div class="relative bg-dark-900 py-24 overflow-hidden">
        <!-- Lighting Background -->
        <div class="ambient-light bg-orange-600/10 top-0 left-0 w-[500px] h-[500px]"></div>
        <div class="ambient-light bg-gold-600/5 bottom-0 right-0 w-[600px] h-[600px]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16 max-w-7xl mx-auto">

                <!-- Text Content -->
                <div class="lg:w-1/2 text-left" data-aos="fade-right">
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-orange-500/30 bg-orange-500/10 text-orange-400 text-xs font-bold uppercase tracking-wider mb-6">
                        <i class="fas fa-fire-alt"></i> Manifiesto
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-cinzel text-white mb-8 leading-tight">
                        ¿Qué es <br>
                        <span class="text-gold-gradient font-bold">INVESTIDOS?</span>
                    </h2>

                    <p class="text-lg text-gray-400 leading-relaxed mb-8 font-light border-l border-gold-500/30 pl-6">
                        No es solo un evento, es una <strong class="text-gray-200">convocatoria divina</strong>.
                        INVESTIDOS 2026 es el tiempo kairos en el que la juventud del Distrito 27 se reúne para recibir
                        el poder y la investidura de Dios. Una experiencia inmersiva de tres días diseñada para
                        transformar tu eternidad.
                    </p>
                </div>

                <!-- Video Card -->
                <div class="lg:w-1/2 w-full" data-aos="fade-left">
                    <div
                        class="relative rounded-2xl overflow-hidden border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.5)] group">
                        <!-- Poster Overlay Effect -->
                        <div
                            class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-all z-10 pointer-events-none">
                        </div>

                        <video class="w-full h-auto transform group-hover:scale-105 transition-transform duration-700"
                            controls preload="metadata" poster="{{ asset('images/investidobanner.png') }}">
                            <source src="{{ asset('images/video-caamp.mp4') }}" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>

                        <!-- Decorative borders -->
                        <div
                            class="absolute top-0 left-0 w-20 h-20 border-t-2 border-l-2 border-gold-500/50 rounded-tl-2xl pointer-events-none">
                        </div>
                        <div
                            class="absolute bottom-0 right-0 w-20 h-20 border-b-2 border-r-2 border-gold-500/50 rounded-br-2xl pointer-events-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BANNER PARALLAX -->
    <div class="relative py-40 bg-fixed bg-center bg-cover border-y border-white/5"
        style="background-image: url('{{ asset('images/investidobanner.png') }}');">
        <div class="absolute inset-0 bg-dark-900/80 backdrop-blur-[2px]"></div>

        <div class="relative container mx-auto text-center px-4 max-w-4xl z-10">
            <i class="fas fa-quote-left text-4xl text-gold-500/30 mb-4 block"></i>
            <h2 class="text-2xl md:text-4xl lg:text-5xl font-cinzel text-white mb-6 leading-snug tracking-wide"
                data-aos="zoom-in">
                "Pero quedaos vosotros en la ciudad de Jerusalén, hasta que seáis <span
                    class="text-gold-400 italic">investidos de poder</span> desde lo alto..."
            </h2>
            <div class="h-[1px] w-20 bg-gold-500 mx-auto mb-4"></div>
            <p class="text-gray-300 text-lg uppercase tracking-[0.3em]" data-aos="fade-up">Lucas 24:49</p>
        </div>
    </div>

    <!-- INVITADOS (Dark & Elegant) -->
    <section id="invitados" class="py-24 relative bg-dark-900">
        <!-- Ambient Gloom -->
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-gold-900/10 via-dark-900 to-dark-900">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-20">
                <span class="text-gold-500 text-xs font-bold uppercase tracking-[0.3em]">Nuestros Invitados</span>
                <h2 class="text-4xl md:text-6xl font-cinzel text-white mt-3 mb-4">Expositores</h2>
                <p class="text-gray-500 max-w-xl mx-auto font-light">Instrumentos escogidos por Dios para impartir una
                    palabra que marcará a esta generación.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

                <!-- Card Template (Loop this structure) -->
                <!-- Pastor Jhon Fabio -->
                <div class="group relative h-[500px] rounded-sm overflow-hidden cursor-pointer" data-aos="fade-up">
                    <div class="absolute inset-0 bg-gray-800">
                        <img src="{{ asset('images/jhonfabio.png') }}" alt="Pastor Jhon Fabio"
                            class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="h-[2px] w-0 group-hover:w-12 bg-gold-500 mb-4 transition-all duration-500"></div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Expositor</p>
                        <h3 class="text-3xl font-cinzel text-white leading-none">Jhon Fabio <br> García</h3>
                    </div>
                    <!-- Border hover effect -->
                    <div
                        class="absolute inset-0 border border-white/5 group-hover:border-gold-500/30 transition-colors duration-500">
                    </div>
                </div>

                <!-- Pastor Michael Alvarez -->
                <div class="group relative h-[500px] rounded-sm overflow-hidden cursor-pointer" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="absolute inset-0 bg-gray-800">
                        <img src="{{ asset('images/michaelalvarez.png') }}" alt="Pastor Michael Alvarez"
                            class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="h-[2px] w-0 group-hover:w-12 bg-gold-500 mb-4 transition-all duration-500"></div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Expositor</p>
                        <h3 class="text-3xl font-cinzel text-white leading-none">Michael <br> Alvarez</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-white/5 group-hover:border-gold-500/30 transition-colors duration-500">
                    </div>
                </div>

                <!-- Adorador Juan Pablo -->
                <div class="group relative h-[500px] rounded-sm overflow-hidden cursor-pointer" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="absolute inset-0 bg-gray-800">
                        <img src="{{ asset('images/juanpablo.png') }}" alt="Juan Pablo M."
                            class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="h-[2px] w-0 group-hover:w-12 bg-gold-500 mb-4 transition-all duration-500"></div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Adoración</p>
                        <h3 class="text-3xl font-cinzel text-white leading-none">Juan Pablo <br> M.</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-white/5 group-hover:border-gold-500/30 transition-colors duration-500">
                    </div>
                </div>

                <!-- Coro -->
                <div class="group relative h-[500px] rounded-sm overflow-hidden cursor-pointer" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="absolute inset-0 bg-gray-800">
                        <img src="{{ asset('images/coro.png') }}" alt="Coro"
                            class="w-full h-full object-cover opacity-60 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="h-[2px] w-0 group-hover:w-12 bg-gold-500 mb-4 transition-all duration-500"></div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Alabanza</p>
                        <h3 class="text-3xl font-cinzel text-white leading-none">Coro <br> Distrito 27</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-white/5 group-hover:border-gold-500/30 transition-colors duration-500">
                    </div>
                </div>

                <!-- Conquistadores -->
                <div class="group relative h-[500px] rounded-sm overflow-hidden cursor-pointer md:col-span-2 lg:col-span-2"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute inset-0 bg-gray-800">
                        <img src="{{ asset('images/conquistadores.png') }}" alt="Conquistadores"
                            class="w-full h-full object-cover object-top opacity-60 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 grayscale group-hover:grayscale-0">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/60 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        <div class="h-[2px] w-0 group-hover:w-12 bg-gold-500 mb-4 transition-all duration-500"></div>
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Organizadores</p>
                        <h3 class="text-3xl font-cinzel text-white leading-none">Conquistadores <br> Pentecostales</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-white/5 group-hover:border-gold-500/30 transition-colors duration-500">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CRONOGRAMA (Neon Line Style) -->
    <section id="cronograma" class="py-24 relative bg-[#080808] overflow-hidden">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-800/20 via-black to-black">
        </div>

        <div class="container mx-auto px-4 max-w-5xl relative z-10">
            <div class="flex flex-col items-center mb-20 text-center">
                <i class="fas fa-hourglass-half text-3xl text-gold-500 mb-4"></i>
                <h2 class="text-4xl md:text-5xl font-cinzel text-white">Cronograma</h2>
                <div class="h-[1px] w-24 bg-gradient-to-r from-transparent via-gold-500 to-transparent mt-6 mb-2"></div>
                <p class="text-gray-500 text-sm italic">Sujeto a la dirección del Espíritu Santo</p>
            </div>

            <div class="relative">
                <!-- Glowing Central Line -->
                <div
                    class="absolute left-8 md:left-1/2 transform md:-translate-x-1/2 h-full w-[2px] bg-gradient-to-b from-transparent via-gold-500 to-transparent shadow-[0_0_15px_rgba(212,175,55,0.5)] opacity-50">
                </div>

                <div class="space-y-16">

                    <!-- Sábado -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-12 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3 class="text-2xl font-cinzel text-white group-hover:text-gold-400 transition">Sábado 16
                                Mayo</h3>
                            <span
                                class="text-gold-600 font-bold text-sm tracking-wider uppercase mb-2 block">Apertura</span>
                            <p class="text-gray-400 font-light">Registro de delegaciones y servicio de apertura.</p>
                        </div>

                        <div
                            class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-black border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:shadow-[0_0_15px_rgba(212,175,55,1)] transition-all duration-300">
                        </div>

                        <div class="md:w-1/2 md:pl-12 hidden md:block opacity-20 text-6xl text-gold-500/20 text-left font-black"
                            data-aos="fade-left">01</div>
                    </div>

                    <!-- Domingo AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-12 hidden md:block opacity-20 text-6xl text-gold-500/20 text-right font-black"
                            data-aos="fade-right">02</div>

                        <div
                            class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-black border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:shadow-[0_0_15px_rgba(212,175,55,1)] transition-all duration-300">
                        </div>

                        <div class="md:w-1/2 md:pl-12 pl-20 w-full" data-aos="fade-left">
                            <h3 class="text-2xl font-cinzel text-white group-hover:text-gold-400 transition">Domingo -
                                8:00 AM</h3>
                            <span class="text-gold-600 font-bold text-sm tracking-wider uppercase mb-2 block">Mañana de
                                Gloria</span>
                            <p class="text-gray-400 font-light">Devocional General, Culto de avivamiento y taller.</p>
                        </div>
                    </div>

                    <!-- Domingo PM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-12 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3 class="text-2xl font-cinzel text-white group-hover:text-gold-400 transition">Domingo -
                                2:00 PM</h3>
                            <span
                                class="text-gold-600 font-bold text-sm tracking-wider uppercase mb-2 block">Actividades</span>
                            <p class="text-gray-400 font-light">Esparcimiento, desafíos dirigidos y campeonatos.</p>
                        </div>
                        <div
                            class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-black border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:shadow-[0_0_15px_rgba(212,175,55,1)] transition-all duration-300">
                        </div>
                        <div class="md:w-1/2 md:pl-12 hidden md:block opacity-20 text-6xl text-gold-500/20 text-left font-black"
                            data-aos="fade-left">03</div>
                    </div>

                    <!-- Domingo Noche (Destacado) -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-12 hidden md:block text-right" data-aos="fade-right">
                            <i class="fas fa-fire text-5xl text-orange-600/50 animate-pulse"></i>
                        </div>

                        <div
                            class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-6 h-6 bg-orange-600 rounded-full border-4 border-black z-20 shadow-[0_0_20px_rgba(234,88,12,0.8)]">
                        </div>

                        <div class="md:w-1/2 md:pl-12 pl-20 w-full" data-aos="fade-left">
                            <h3 class="text-3xl font-cinzel text-white font-bold text-gold-gradient">NOCHE DE
                                INVESTIDURA</h3>
                            <span class="text-orange-500 font-bold text-sm tracking-wider uppercase mb-2 block">Domingo
                                - 7:00 PM</span>
                            <p class="text-gray-300 font-light">Adoración, culto de restauración y renovación
                                espiritual.</p>
                        </div>
                    </div>

                    <!-- Lunes AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-12 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3 class="text-2xl font-cinzel text-white group-hover:text-gold-400 transition">Lunes -
                                8:00 AM</h3>
                            <span class="text-gold-600 font-bold text-sm tracking-wider uppercase mb-2 block">Cierre y
                                Santa Cena</span>
                            <p class="text-gray-400 font-light">Adoración y Servicio de clausura.</p>
                        </div>
                        <div
                            class="absolute left-8 md:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-black border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:shadow-[0_0_15px_rgba(212,175,55,1)] transition-all duration-300">
                        </div>
                        <div class="md:w-1/2 md:pl-12 hidden md:block opacity-20 text-6xl text-gold-500/20 text-left font-black"
                            data-aos="fade-left">04</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- INVERSION -->
    <section id="inversion" class="py-24 relative bg-dark-900 overflow-hidden">
        <!-- Background Glows -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gold-600/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-900/5 rounded-full blur-[100px]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span class="text-gray-500 uppercase tracking-widest text-sm">Reserva tu lugar</span>
                <h2 class="text-4xl md:text-6xl font-cinzel text-white mt-2">Planes de Inversión</h2>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center gap-8 max-w-5xl mx-auto">

                <!-- Plan Parcial -->
                <div class="w-full lg:w-5/12 glass-panel rounded-3xl p-8 hover:bg-white/5 transition duration-500 relative group"
                    data-aos="fade-up">
                    <div class="text-center mb-8">
                        <h3 class="text-xl font-montserrat text-gray-300 uppercase tracking-widest">Estadía Parcial</h3>
                        <div class="flex justify-center items-baseline gap-1 mt-4">
                            <span class="text-2xl text-gray-500">$</span>
                            <span class="text-5xl font-bold text-white tracking-tighter">
                                @if(class_exists('App\Models\GlobalSetting'))
                                    {{ number_format(\App\Models\GlobalSetting::get('partial_stay_cost', 120000), 0) }}
                                @else
                                    120.000
                                @endif
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2 uppercase">Un solo día</p>
                    </div>

                    <ul class="space-y-4 mb-8 text-gray-400 text-sm">
                        <li class="flex items-center gap-3"><i class="fas fa-check text-gold-500"></i> Entrada a
                            conferencias</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check text-gold-500"></i> Material de apoyo
                        </li>
                        <li class="flex items-center gap-3"><i class="fas fa-check text-gold-500"></i> Almuerzo y cena
                            (1 día)</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check text-gold-500"></i> Tarde de
                            esparcimiento</li>
                    </ul>

                    <a href="{{ route('registration') }}"
                        class="block w-full py-3 border border-gray-600 rounded-xl text-center text-gray-300 hover:text-white hover:border-white transition uppercase text-xs tracking-widest font-bold">
                        Seleccionar
                    </a>
                </div>

                <!-- Plan Full (Highlighted) -->
                <div class="w-full lg:w-6/12 relative group" data-aos="fade-up" data-aos-delay="100">
                    <!-- Glow Border -->
                    <div
                        class="absolute -inset-[1px] bg-gradient-to-b from-gold-400 to-transparent rounded-[26px] opacity-50 blur-sm group-hover:opacity-100 transition duration-500">
                    </div>

                    <div
                        class="relative bg-[#101010] border border-white/5 rounded-3xl p-10 overflow-hidden h-full shadow-2xl">
                        <!-- Shine effect -->
                        <div
                            class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 bg-gold-500/20 blur-3xl rounded-full">
                        </div>

                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 bg-gold-500 text-black text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1 rounded-b-lg">
                            Recomendado
                        </div>

                        <div class="text-center mb-8 mt-4">
                            <h3 class="text-2xl font-cinzel text-gold-400 uppercase tracking-widest">Investidura Total
                            </h3>
                            <div class="flex justify-center items-baseline gap-1 mt-4">
                                <span class="text-3xl text-gold-600">$</span>
                                <span class="text-7xl font-bold text-white tracking-tighter text-shadow-lg">
                                    @if(class_exists('App\Models\GlobalSetting'))
                                        {{ number_format(\App\Models\GlobalSetting::get('default_total_cost', 300000), 0) }}
                                    @else
                                        300.000
                                    @endif
                                </span>
                            </div>
                            <p class="text-sm font-bold text-gray-500 mt-2 uppercase tracking-wide">Experiencia Completa
                            </p>
                        </div>

                        <div class="space-y-5 mb-10 pl-4 border-l border-gold-500/20 ml-4">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fas fa-check text-xs text-gold-400"></i></div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Acceso Total 3 Días</h4>
                                    <p class="text-gray-500 text-xs">Todas las plenarias y talleres.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fas fa-check text-xs text-gold-400"></i></div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Hospedaje en Cabaña</h4>
                                    <p class="text-gray-500 text-xs">Alojamiento cómodo incluido.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fas fa-check text-xs text-gold-400"></i></div>
                                <div>
                                    <h4 class="text-white font-bold text-sm">Alimentación Completa</h4>
                                    <p class="text-gray-500 text-xs">Desde el sábado hasta el lunes.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-6 h-6 rounded-full bg-gold-500/20 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fas fa-check text-xs text-gold-400"></i></div>
                                <span class="text-gray-300 text-sm">Kit de Bienvenida Premium</span>
                            </div>
                        </div>

                        <a href="{{ route('registration') }}"
                            class="block w-full py-4 bg-gold-500 hover:bg-gold-400 rounded-xl text-center text-black font-black uppercase text-sm tracking-widest shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:shadow-[0_0_30px_rgba(212,175,55,0.5)] transition-all transform hover:-translate-y-1">
                            Inscribirme Ahora
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black pt-20 pb-10 border-t border-white/5 relative overflow-hidden">
        <div
            class="absolute inset-0 bg-[url('{{ asset('images/INVESTIDOS.png') }}')] bg-center bg-no-repeat opacity-[0.03] bg-contain pointer-events-none grayscale">
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start gap-12">

                <div class="md:w-1/3">
                    <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco" class="h-16 mb-6 opacity-70">
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Campamento Juvenil 2026.<br>
                        Distrito 27 - Iglesia Pentecostal Unida de Colombia.
                    </p>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-white font-cinzel font-bold mb-6">Contacto</h3>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone text-gold-500"></i>
                            <span>311 330 0389</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-mobile-alt text-gold-500"></i>
                            <span>313 277 7477</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-gold-500"></i>
                            <span>conquistadoresdt27@gmail.com</span>
                        </li>
                    </ul>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-white font-cinzel font-bold mb-6">Síguenos</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/share/17yXzxdwEL/" target="_blank"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/conquistadoresd27" target="_blank"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:text-white transition-all"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@conquistadorespentecostawy8tm" target="_blank"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-red-600 hover:text-white transition-all"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://whatsapp.com/channel/0029Vb29KYMDDmFP0H0gWs2x" target="_blank"
                            class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-green-600 hover:text-white transition-all"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

            </div>

            <div
                class="border-t border-white/5 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-600">
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
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function () {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 20) {
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
                document.getElementById("countdown").innerHTML = "<span class='text-gold-500 font-bold'>¡EL TIEMPO HA LLEGADO!</span>";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Updated Time Box Design
            const timeBoxClass = "flex flex-col items-center justify-center w-16 h-16 md:w-20 md:h-20 rounded-lg bg-white/5 border border-gold-500/20 backdrop-blur-sm";
            const numberClass = "text-xl md:text-3xl font-cinzel font-bold text-white leading-none";
            const labelClass = "text-[10px] text-gold-500 uppercase tracking-widest mt-1";

            document.getElementById("countdown").innerHTML = `
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${days}</span>
                    <span class="${labelClass}">Días</span>
                </div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${hours}</span>
                    <span class="${labelClass}">Hrs</span>
                </div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${minutes}</span>
                    <span class="${labelClass}">Min</span>
                </div>
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