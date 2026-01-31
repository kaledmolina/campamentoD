<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVESTI2 - Campamento Juvenil 2026</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&family=Cinzel:wght@400;700&display=swap"
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
                            400: '#FDD835',
                            500: '#D4AF37',
                            600: '#B38F00',
                        },
                        fire: '#FF4500'
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
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

        /* Efecto de Texto Dorado */
        .text-gradient-gold {
            background: linear-gradient(to bottom, #cfc09f 22%, #634f2c 24%, #cfc09f 26%, #cfc09f 27%, #ffecb3 40%, #3a2c0f 78%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: #fff;
        }

        /* Glassmorphism Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 215, 0, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Partículas de fuego fondo */
        .fire-bg {
            background: radial-gradient(circle at center, rgba(255, 69, 0, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
        }

        .nav-scrolled {
            background-color: rgba(0, 0, 0, 0.95);
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #000;
        }

        ::-webkit-scrollbar-thumb {
            background: #D4AF37;
            border-radius: 5px;
        }
    </style>
</head>

<body class="font-montserrat">

    <!-- NAVIGATION -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold flex items-center gap-2 group">
                <img src="{{ asset('images/logo_investi.png') }}" alt="Logo" class="h-10 md:h-12 transition-transform duration-300 group-hover:scale-110">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center bg-black/30 backdrop-blur-md px-8 py-3 rounded-full border border-white/10">
                <a href="#inicio"
                    class="text-gray-300 hover:text-gold-400 text-xs uppercase tracking-widest transition duration-300">Inicio</a>
                <a href="#invitados"
                    class="text-gray-300 hover:text-gold-400 text-xs uppercase tracking-widest transition duration-300">Invitados</a>
                <a href="#programa"
                    class="text-gray-300 hover:text-gold-400 text-xs uppercase tracking-widest transition duration-300">Programa</a>
                <a href="#inversion"
                    class="text-gray-300 hover:text-gold-400 text-xs uppercase tracking-widest transition duration-300">Inversión</a>
                <a href="/consultar"
                    class="text-gray-300 hover:text-gold-400 text-xs uppercase tracking-widest transition duration-300">Consulta / Pagos</a>
            </div>

            <!-- CTA Button -->
            <a href="/registro"
                class="hidden md:inline-block bg-gradient-to-r from-yellow-600 to-yellow-400 text-black font-bold py-2 px-6 rounded-full shadow-[0_0_15px_rgba(250,204,21,0.5)] transform hover:scale-105 transition duration-300 text-xs tracking-wider">
                INSCRIBIRME
            </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="md:hidden text-2xl text-white focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] bg-black/95 transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center space-y-8">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-3xl text-gray-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>

        <a href="#inicio"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Inicio</a>
        <a href="#invitados"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Invitados</a>
        <a href="#cronograma"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Programa</a>
        <a href="#inversion"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Inversión</a>
        <a href="{{ route('consultation') }}"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Consulta
            / Pagos</a>

        <a href="{{ route('registration') }}"
            class="mt-4 bg-gold-500 text-black font-bold py-3 px-8 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)]">
            INSCRIBIRME
        </a>
    </div>

    <!-- HERO SECTION -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/16x9.png') }}"
                class="w-full h-full object-cover opacity-40 scale-105 animate-pulse-slow" alt="Fondo">
            <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-[#050505]/60 to-black/80"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-12">

            <!-- Logo Image -->
            <div class="relative w-full max-w-3xl mx-auto px-4 -mb-4" data-aos="zoom-in" data-aos-duration="1500">
                <img src="{{ asset('images/camp_logo_2026.png') }}"
                    alt="Campamento Juvenil 2026"
                    class="w-full h-auto drop-shadow-[0_0_25px_rgba(212,175,55,0.4)] hover:drop-shadow-[0_0_40px_rgba(212,175,55,0.6)] transition-all duration-500 transform hover:scale-105">
            </div>

            <!-- Logos Distrito Image -->
            <div class="relative w-full max-w-2xl mx-auto px-4 mb-8" data-aos="fade-up" data-aos-delay="500">
                <img src="{{ asset('images/logos_distrito.png') }}"
                    alt="Logos Distrito"
                    class="w-full h-auto opacity-90 hover:opacity-100 transition-opacity duration-500">
            </div>

            <!-- Countdown Label -->
             <p data-aos="fade-up" data-aos-delay="600" class="text-gold-500 font-cinzel text-xs md:text-sm tracking-[0.4em] uppercase mb-4 font-bold">
                Cuenta Regresiva
            </p>

            <!-- Countdown Timer -->
            <div data-aos="fade-up" data-aos-delay="700" class="flex flex-wrap justify-center gap-3 md:gap-6 mb-8"
                id="countdown">
                <!-- Se llena con JS -->
            </div>

            <div data-aos="fade-up" data-aos-delay="900"
                class="flex flex-col md:flex-row justify-center items-center gap-4">
                <a href="{{ route('registration') }}"
                    class="group relative px-8 py-4 bg-transparent border border-gold-500 text-gold-500 font-bold uppercase tracking-widest overflow-hidden rounded-md transition-all hover:text-black">
                    <div
                        class="absolute inset-0 w-0 bg-gold-500 transition-all duration-[250ms] ease-out group-hover:w-full">
                    </div>
                    <span class="relative z-10">Reservar Cupo</span>
                </a>
                <a href="https://wa.me/573113300389" target="_blank"
                    class="text-gray-400 hover:text-white flex items-center gap-2 text-sm uppercase tracking-widest transition">
                    <i class="fab fa-whatsapp text-lg"></i> Más Información
                </a>
            </div>
        </div>

        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-gold-500 text-2xl"></i>
        </div>
    </header>

    <!-- INTRODUCCIÓN -->
    <section class="py-20 relative">
        <div class="absolute inset-0 fire-bg pointer-events-none"></div>
        <div class="container mx-auto px-4 text-center max-w-3xl">
            <i class="fas fa-fire text-4xl text-orange-600 mb-6" data-aos="fade-down"></i>
            <h2 class="text-3xl md:text-5xl font-cinzel text-white mb-8" data-aos="fade-up">¿Qué es <span
                    class="text-gold-500">INVESTIDOS</span>?</h2>
            <p class="text-lg text-gray-300 leading-relaxed mb-8" data-aos="fade-up" data-aos-delay="200">
                No es solo un evento, es una <strong>convocatoria divina</strong>. INVESTIDOS 2026 es el tiempo en el
                que
                la juventud del Distrito 27 se reúne para recibir el poder y la investidura de Dios, que transforma
                vidas y
                generaciones. Prepárate para tres días únicos que marcarán tu vida para siempre. ¡Bienvenido!
            </p>
            <div class="h-1 w-24 bg-gradient-to-r from-transparent via-gold-500 to-transparent mx-auto"
                data-aos="scale-x"></div>
        </div>
    </section>

    <!-- BANNER PARALLAX -->
    <div class="relative py-32 bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/investidobanner.png') }}');">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative container mx-auto text-center px-4">
            <h2 class="text-3xl md:text-5xl font-black uppercase text-white mb-6 drop-shadow-lg" data-aos="zoom-in">
                "Pero quedaos vosotros en la ciudad de Jerusalén, hasta que seáis investidos de poder desde lo alto..."
            </h2>
            <p class="text-gold-500 text-xl font-cinzel" data-aos="fade-up">Lucas 24:49</p>
        </div>
    </div>

    <!-- INVITADOS (GRID MEJORADO) -->
    <section id="invitados" class="py-20 bg-[#0a0a0a]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-black text-center mb-16 uppercase text-gray-800 relative"
                data-aos="fade-in">
                Expositores
                <span
                    class="absolute inset-0 text-transparent bg-clip-text bg-gradient-to-b from-white/10 to-transparent blur-sm">Expositores</span>
                <p class="text-lg md:text-xl text-gold-500 font-cinzel font-normal mt-[-10px] relative z-10 capitalize">
                    De la Palabra de Dios</p>
            </h2>

            <!-- Grid Container with Centering for last row items -->
            <div class="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto">

                <!-- Conquistadores Distrito 27 -->
                <div class="group relative w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.33%-2rem)] h-96 rounded-2xl overflow-hidden cursor-pointer 
                            bg-gray-900 border border-transparent hover:border-gold-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:-translate-y-2"
                    data-aos="flip-left">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center overflow-hidden">
                        <i
                            class="fas fa-users text-7xl text-gray-700 group-hover:text-gold-500 transition duration-700 transform group-hover:scale-110 group-hover:rotate-3"></i>
                        <!-- Glow Circle Behind Icon -->
                        <div
                            class="absolute w-32 h-32 bg-gold-500/10 rounded-full blur-2xl group-hover:bg-gold-500/20 transition duration-500">
                        </div>
                    </div>

                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/90 to-transparent opacity-90 group-hover:opacity-80 transition duration-500">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <p
                            class="text-orange-500 font-bold uppercase text-xs mb-2 tracking-[0.2em] transform group-hover:translate-x-2 transition duration-500">
                            Invitados Especiales</p>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">Conquistadores <span
                                class="text-gold-500">Distrito 27</span></h3>
                        <div
                            class="h-1 w-12 bg-gray-700 group-hover:w-full group-hover:bg-gold-500 transition-all duration-700 mt-4 rounded-full">
                        </div>
                    </div>
                </div>

                <!-- Coro Distrito 27 -->
                <div class="group relative w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.33%-2rem)] h-96 rounded-2xl overflow-hidden cursor-pointer 
                            bg-gray-900 border border-transparent hover:border-gold-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:-translate-y-2"
                    data-aos="flip-left" data-aos-delay="100">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center overflow-hidden">
                        <i
                            class="fas fa-music text-7xl text-gray-700 group-hover:text-gold-500 transition duration-700 transform group-hover:scale-110 group-hover:-rotate-3"></i>
                        <div
                            class="absolute w-32 h-32 bg-gold-500/10 rounded-full blur-2xl group-hover:bg-gold-500/20 transition duration-500">
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/90 to-transparent opacity-90 group-hover:opacity-80 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <p
                            class="text-orange-500 font-bold uppercase text-xs mb-2 tracking-[0.2em] transform group-hover:translate-x-2 transition duration-500">
                            Alabanza</p>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">Coro <span
                                class="text-gold-500">Distrito 27</span></h3>
                        <div
                            class="h-1 w-12 bg-gray-700 group-hover:w-full group-hover:bg-gold-500 transition-all duration-700 mt-4 rounded-full">
                        </div>
                    </div>
                </div>

                <!-- Pastor Jhon Fabio García -->
                <div class="group relative w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.33%-2rem)] h-96 rounded-2xl overflow-hidden cursor-pointer 
                            bg-gray-900 border border-transparent hover:border-gold-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:-translate-y-2"
                    data-aos="flip-left" data-aos-delay="200">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center overflow-hidden">
                        <i
                            class="fas fa-user-tie text-7xl text-gray-700 group-hover:text-gold-500 transition duration-700 transform group-hover:scale-110"></i>
                        <div
                            class="absolute w-32 h-32 bg-gold-500/10 rounded-full blur-2xl group-hover:bg-gold-500/20 transition duration-500">
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/90 to-transparent opacity-90 group-hover:opacity-80 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <p
                            class="text-orange-500 font-bold uppercase text-xs mb-2 tracking-[0.2em] transform group-hover:translate-x-2 transition duration-500">
                            Expositor</p>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">Pastor <br><span
                                class="text-gold-500">Jhon Fabio</span></h3>
                        <div
                            class="h-1 w-12 bg-gray-700 group-hover:w-full group-hover:bg-gold-500 transition-all duration-700 mt-4 rounded-full">
                        </div>
                    </div>
                </div>

                <!-- Pastor Michael Alvarez -->
                <div class="group relative w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.33%-2rem)] h-96 rounded-2xl overflow-hidden cursor-pointer 
                            bg-gray-900 border border-transparent hover:border-gold-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:-translate-y-2"
                    data-aos="flip-left" data-aos-delay="300">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center overflow-hidden">
                        <i
                            class="fas fa-user-tie text-7xl text-gray-700 group-hover:text-gold-500 transition duration-700 transform group-hover:scale-110"></i>
                        <div
                            class="absolute w-32 h-32 bg-gold-500/10 rounded-full blur-2xl group-hover:bg-gold-500/20 transition duration-500">
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/90 to-transparent opacity-90 group-hover:opacity-80 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <p
                            class="text-orange-500 font-bold uppercase text-xs mb-2 tracking-[0.2em] transform group-hover:translate-x-2 transition duration-500">
                            Expositor</p>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">Pastor <br><span
                                class="text-gold-500">Michael Alvarez</span></h3>
                        <div
                            class="h-1 w-12 bg-gray-700 group-hover:w-full group-hover:bg-gold-500 transition-all duration-700 mt-4 rounded-full">
                        </div>
                    </div>
                </div>

                <!-- Adorador Juan Pablo Murillo -->
                <div class="group relative w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.33%-2rem)] h-96 rounded-2xl overflow-hidden cursor-pointer 
                            bg-gray-900 border border-transparent hover:border-gold-500/50 transition-all duration-500 hover:shadow-[0_0_30px_rgba(212,175,55,0.15)] hover:-translate-y-2"
                    data-aos="flip-left" data-aos-delay="400">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center overflow-hidden">
                        <i
                            class="fas fa-microphone text-7xl text-gray-700 group-hover:text-gold-500 transition duration-700 transform group-hover:scale-110"></i>
                        <div
                            class="absolute w-32 h-32 bg-gold-500/10 rounded-full blur-2xl group-hover:bg-gold-500/20 transition duration-500">
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black via-black/90 to-transparent opacity-90 group-hover:opacity-80 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <p
                            class="text-orange-500 font-bold uppercase text-xs mb-2 tracking-[0.2em] transform group-hover:translate-x-2 transition duration-500">
                            Adoración</p>
                        <h3 class="text-2xl md:text-3xl font-black text-white mb-2 leading-tight">Adorador <br><span
                                class="text-gold-500">Juan Pablo</span></h3>
                        <div
                            class="h-1 w-12 bg-gray-700 group-hover:w-full group-hover:bg-gold-500 transition-all duration-700 mt-4 rounded-full">
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center text-gray-500 mt-8 italic" data-aos="fade-in">Y muchos más siervos de Dios...</p>
        </div>
    </section>



    <!-- CRONOGRAMA (TIMELINE) -->
    <section id="cronograma" class="py-20 bg-[#050505] relative overflow-hidden">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-white" data-aos="fade-up">Cronograma</h2>
                <p class="text-gray-400 mt-2" data-aos="fade-up">Agenda sujeta a la dirección del Espíritu Santo</p>
            </div>

            <!-- Linea Vertical Central (Desktop) -->
            <div class="relative">
                <div
                    class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full border-l-2 border-gold-500/30">
                </div>

                <div class="space-y-12">

                    <!-- Item 1: Sábado -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Empty/Icon) -->
                        <div class="w-full md:w-[45%] text-right pr-8 hidden md:block" data-aos="fade-right">
                            <div class="flex justify-end items-center h-full">
                                <i
                                    class="fas fa-door-open text-5xl text-gray-800 group-hover:text-gold-500/50 transition duration-500"></i>
                            </div>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-left relative ml-6 md:ml-8"
                            data-aos="fade-left">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Sábado 16 Mayo</span>
                            <h3 class="text-xl font-bold text-white">Registro y Apertura</h3>
                            <p class="text-sm text-gray-400 mt-2">Recepción de delegaciones.</p>
                        </div>
                    </div>

                    <!-- Item 2: Domingo Mañana -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-right relative ml-6 md:ml-0 md:mr-8"
                            data-aos="fade-right">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Domingo 17 Mayo - 8:00 AM</span>
                            <h3 class="text-xl font-bold text-white">MAÑANA DE GLORIA</h3>
                            <p class="text-sm text-gray-400 mt-2">Devocional General, Culto de avivamiento y taller de
                                formación.</p>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Icon) -->
                        <div class="w-full md:w-[45%] text-left pl-8 hidden md:block" data-aos="fade-left">
                            <i
                                class="fas fa-sun text-5xl text-gray-800 group-hover:text-gold-500/50 transition duration-500"></i>
                        </div>
                    </div>

                    <!-- Item 3: Domingo Tarde -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Icon) -->
                        <div class="w-full md:w-[45%] text-right pr-8 hidden md:block" data-aos="fade-right">
                            <i
                                class="fas fa-running text-5xl text-gray-800 group-hover:text-gold-500/50 transition duration-500"></i>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-left relative ml-6 md:ml-8"
                            data-aos="fade-left">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Domingo 17 Mayo - 2:00 PM</span>
                            <h3 class="text-xl font-bold text-white">TARDE DE ACTIVIDADES</h3>
                            <p class="text-sm text-gray-400 mt-2">Esparcimiento, desafíos dirigidos y campeonatos
                                zonales.</p>
                        </div>
                    </div>

                    <!-- Item 4: Domingo Noche -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-right relative ml-6 md:ml-0 md:mr-8"
                            data-aos="fade-right">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Domingo 17 Mayo - 7:00 PM</span>
                            <h3 class="text-xl font-bold text-white">NOCHE DE INVESTIDURA</h3>
                            <p class="text-sm text-gray-400 mt-2">Adoración, culto de restauración y renovación
                                espiritual.</p>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-orange-600 border-4 border-black z-10 animate-pulse ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Icon) -->
                        <div class="w-full md:w-[45%] text-left pl-8 hidden md:block" data-aos="fade-left">
                            <i
                                class="fas fa-fire text-5xl text-gray-800 group-hover:text-orange-500/50 transition duration-500"></i>
                        </div>
                    </div>

                    <!-- Item 5: Lunes Mañana -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Icon) -->
                        <div class="w-full md:w-[45%] text-right pr-8 hidden md:block" data-aos="fade-right">
                            <i
                                class="fas fa-hands-praying text-5xl text-gray-800 group-hover:text-gold-500/50 transition duration-500"></i>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 animate-ping ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-left relative ml-6 md:ml-8"
                            data-aos="fade-left">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Lunes 18 Mayo - 8:00 AM</span>
                            <h3 class="text-xl font-bold text-white">GRAN CIERRE: INVESTIDOS</h3>
                            <p class="text-sm text-gray-400 mt-2">Adoración, Servicio de clausura y Santa Cena.</p>
                        </div>
                    </div>

                    <!-- Item 6: Lunes Tarde -->
                    <div class="flex flex-col md:flex-row items-center justify-between group w-full">
                        <!-- Left Side (Content) -->
                        <div class="w-full md:w-[45%] pl-8 md:pl-0 p-6 glass-card rounded-xl hover:bg-white/5 transition text-center md:text-right relative ml-6 md:ml-0 md:mr-8"
                            data-aos="fade-right">
                            <span class="text-orange-500 font-bold text-sm block mb-1">Lunes 18 Mayo - 2:00 PM</span>
                            <h3 class="text-xl font-bold text-white">TARDE RECREATIVA</h3>
                            <p class="text-sm text-gray-400 mt-2">Esparcimiento, finalización de actividades y retorno.
                            </p>
                        </div>

                        <!-- Center Dot -->
                        <div
                            class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10 ml-[-10px] md:ml-0 mt-6 md:mt-0">
                        </div>

                        <!-- Right Side (Icon) -->
                        <div class="w-full md:w-[45%] text-left pl-8 hidden md:block" data-aos="fade-left">
                            <i
                                class="fas fa-bus text-5xl text-gray-800 group-hover:text-gold-500/50 transition duration-500"></i>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- INVERSION -->
    <section id="inversion" class="py-20 bg-gradient-to-b from-[#0a0a0a] to-[#111]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">Inversión</h2>

            <div class="flex flex-col md:flex-row justify-center gap-8 max-w-4xl mx-auto">
                <!-- Plan 1 -->
                <div class="glass-card p-8 rounded-2xl flex-1 text-center transform hover:-translate-y-2 transition duration-300 relative overflow-hidden"
                    data-aos="zoom-in-right">
                    @use('App\Models\GlobalSetting')

                    <h3 class="text-xl font-bold text-gray-300 uppercase tracking-widest mb-4">Estadía Parcial</h3>
                    <div class="text-4xl font-black text-white mb-2">
                        ${{ number_format(GlobalSetting::get('partial_stay_cost', 100000), 0) }}</div>
                    <p class="text-sm text-gray-500 mb-6">(Domingo, 17 mayo)</p>

                    <ul class="text-left space-y-3 mb-8 text-gray-300 text-sm">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Entrada a
                            conferencias</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Material de
                            apoyo</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Alimentación
                            (Almuerzo y cena)</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Tarde de
                            esparcimiento</li>
                    </ul>

                    <a href="{{ route('registration') }}"
                        class="block w-full py-3 border border-gray-600 rounded-lg hover:border-white hover:bg-white hover:text-black transition font-bold">Elegir
                        Plan</a>
                </div>

                <!-- Plan Full (Destacado) -->
                <div class="glass-card p-8 rounded-2xl flex-1 text-center transform scale-105 border-gold-500 shadow-[0_0_30px_rgba(212,175,55,0.15)] relative"
                    data-aos="zoom-in">
                    <div
                        class="absolute top-0 right-0 bg-gold-500 text-black text-xs font-bold px-3 py-1 rounded-bl-lg">
                        RECOMENDADO</div>

                    <h3 class="text-xl font-bold text-gold-500 uppercase tracking-widest mb-4">Investidura Total</h3>
                    <div class="text-5xl font-black text-white mb-2">
                        ${{ number_format(GlobalSetting::get('default_total_cost', 300000), 0) }}</div>
                    <p class="text-sm text-gray-500 mb-6">Todo incluido</p>

                    <ul class="text-left space-y-3 mb-8 text-gray-300 text-sm">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-gold-500"></i> Acceso Total 3
                            Días</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-gold-500"></i> Hospedaje en
                            Cabaña</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-gold-500"></i> Alimentación
                            Completa</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-gold-500"></i> Kit de Bienvenida
                        </li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-gold-500"></i> Hidratación y
                            Cafetería
                        </li>
                    </ul>

                    <a href="{{ route('registration') }}"
                        class="block w-full py-3 bg-gradient-to-r from-orange-600 to-gold-500 rounded-lg hover:shadow-lg transition font-bold text-black">Inscribirme
                        Ahora</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER / CONTACTO -->
    <footer id="registro" class="bg-black pt-20 pb-10 border-t border-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center text-center md:text-left">

                <div data-aos="fade-up">
                    <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco"
                        class="h-20 mx-auto md:mx-0 mb-4 opacity-80">
                    <p class="text-gray-500 text-sm">Conquistadores Pentecostales – Distrito 27<br>Iglesia Pentecostal
                        Unida de Colombia</p>
                </div>

                <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xl font-bold text-white mb-4">MAYOR INFORMACIÓN</h3>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-phone text-gold-500"></i> 3113300389 – 3132777477 – 3122138597
                    </p>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-envelope text-gold-500"></i> conquistadoresdt27@gmail.com
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-white mb-4">Síguenos</h3>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="https://www.facebook.com/share/17yXzxdwEL/" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/conquistadoresd27?utm_source=qr&igsh=MWd5MmZzaXRibDZ0Ng=="
                            target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@conquistadorespentecostawy8tm?si=8iXByAX8QITyIzEm" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://whatsapp.com/channel/0029Vb29KYMDDmFP0H0gWs2x" target="_blank"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-900 mt-12 pt-8 text-center text-gray-600 text-xs">
                &copy; 2026 Misión Juvenil. Todos los derechos reservados. <br>
                Desarrollado por <a href="https://wa.me/573004200048" target="_blank"
                    class="text-gold-500 hover:text-white transition">Kaled Molina</a>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->

    <!-- AOS Animation Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
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

        // Countdown Logic - Target Date: May 16, 2026 at 8:00 AM (Colombia Time)
        const targetDate = new Date("2026-05-16T08:00:00-05:00").getTime();

        const countdownInterval = setInterval(function () {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "¡EL TIEMPO HA LLEGADO!";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const timeBoxClass = "bg-white/10 backdrop-blur-md border border-gold-500/30 rounded-lg p-2 md:p-4 text-center min-w-[70px] md:min-w-[100px]";
            const numberClass = "block text-xl md:text-4xl font-bold text-white";
            const labelClass = "text-[10px] md:text-xs text-gold-500 uppercase tracking-widest";

            document.getElementById("countdown").innerHTML = `
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${days}</span>
                    <span class="${labelClass}">Días</span>
                </div>
                <div class="${timeBoxClass}">
                    <span class="${numberClass}">${hours}</span>
                    <span class="${labelClass}">Horas</span>
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

        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden'); // Prevent scrolling when menu is open
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // Close menu when clicking a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    </script>
</body>

</html>