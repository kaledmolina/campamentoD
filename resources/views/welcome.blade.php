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
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Cinzel:wght@400;500;600;700;800;900&display=swap"
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
                        // Paleta Dorada Metálica (Más brillante y menos amarilla)
                        gold: {
                            50: '#FBF7E6',
                            100: '#F5EBC4',
                            200: '#ECD58C',
                            300: '#E4BF55',
                            400: '#D4AF37', // Gold Base
                            500: '#BFA124', // Metallic Darker
                            600: '#997B14',
                            700: '#75590B',
                            800: '#564006',
                            900: '#3D2C03',
                        },
                        // Paleta Oscura "Obsidiana" (Más neutra y elegante que el marrón)
                        obsidian: {
                            950: '#020202', // Casi negro absoluto
                            900: '#080808', // Negro profundo
                            800: '#121212', // Carbón oscuro
                            700: '#1c1c1c', // Carbón suave
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                        'luxury-gradient': 'linear-gradient(135deg, #020202 0%, #121212 100%)',
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
            background-color: #020202;
            color: #e5e5e5;
        }

        /* Ruido granulado cinematográfico */
        .bg-grain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        /* Glassmorphism Ultra Premium */
        .glass-premium {
            background: rgba(20, 20, 20, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .glass-premium:hover {
            border-color: rgba(212, 175, 55, 0.4);
            background: rgba(20, 20, 20, 0.6);
            box-shadow: 0 0 25px rgba(212, 175, 55, 0.15);
        }

        /* Texto Dorado Líquido */
        .text-gold-liquid {
            background: linear-gradient(to right, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            background-size: 200% auto;
            animation: shine 5s linear infinite;
        }

        /* Scrollbar de Lujo */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #020202;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #75590B, #D4AF37);
            border-radius: 3px;
        }

        /* Navegación Scrolleada */
        .nav-scrolled {
            background: rgba(2, 2, 2, 0.85) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
            padding-top: 12px !important;
            padding-bottom: 12px !important;
        }

        /* Luces de ambiente */
        .spotlight {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            mix-blend-mode: screen;
        }
    </style>
</head>

<body class="font-montserrat antialiased selection:bg-gold-500 selection:text-black overflow-x-hidden">
    <div class="bg-grain"></div>

    <!-- NAVIGATION -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-500 py-6 border-b border-white/5">
        <div class="container mx-auto px-6 flex justify-between items-center relative z-50">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 group md:absolute md:left-0">
                <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo"
                    class="h-8 md:h-16 transition-transform duration-300 group-hover:scale-105 filter drop-shadow-[0_0_8px_rgba(212,175,55,0.3)]">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-10 mx-auto">
                <a href="#inicio"
                    class="text-[11px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gold-300 transition-colors duration-300 relative group">
                    Inicio
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[1px] bg-gold-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#invitados"
                    class="text-[11px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gold-300 transition-colors duration-300 relative group">
                    Invitados
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[1px] bg-gold-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#Agenda"
                    class="text-[11px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gold-300 transition-colors duration-300 relative group">
                    Agenda
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[1px] bg-gold-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#inversion"
                    class="text-[11px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gold-300 transition-colors duration-300 relative group">
                    Inversión
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[1px] bg-gold-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/consulta"
                    class="text-[11px] font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-gold-300 transition-colors duration-300 relative group">
                    Pagos
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[1px] bg-gold-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="flex items-center gap-4">
                <a href="/registro"
                    class="hidden md:inline-flex items-center justify-center bg-gradient-to-r from-gold-500 via-gold-400 to-gold-600 text-black font-black text-[10px] py-3 px-8 rounded-sm uppercase tracking-[0.15em] shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:shadow-[0_0_30px_rgba(212,175,55,0.6)] transform hover:-translate-y-0.5 transition duration-300 border border-gold-300">
                    INSCRIBIRME
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn"
                    class="md:hidden w-10 h-10 flex items-center justify-center rounded-sm bg-white/5 border border-white/10 text-gold-400">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] bg-black/95 backdrop-blur-2xl transform translate-x-full transition-transform duration-500 flex flex-col items-center justify-center space-y-8">
        <button id="close-menu-btn"
            class="absolute top-6 right-6 w-12 h-12 flex items-center justify-center rounded-full bg-white/5 border border-white/10 text-gray-400 hover:text-white">
            <i class="fas fa-times text-xl"></i>
        </button>

        <a href="#inicio" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-gray-300 hover:text-gold-400 transition-colors">Inicio</a>
        <a href="#invitados" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-gray-300 hover:text-gold-400 transition-colors">Invitados</a>
        <a href="#Agenda" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-gray-300 hover:text-gold-400 transition-colors">Agenda</a>
        <a href="#inversion" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-gray-300 hover:text-gold-400 transition-colors">Inversión</a>
        <a href="{{ route('consultation') }}" onclick="toggleMenu()"
            class="mobile-link text-3xl font-cinzel text-gray-300 hover:text-gold-400 transition-colors">Consulta</a>

        <a href="{{ route('registration') }}" onclick="toggleMenu()"
            class="mt-8 bg-gold-500 text-black font-bold py-4 px-12 rounded-sm shadow-[0_0_25px_rgba(212,175,55,0.4)] tracking-[0.2em] uppercase hover:bg-gold-400">
            Inscribirme
        </a>
    </div>

    <!-- HERO SECTION -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-obsidian-950">
        <!-- Dynamic Background -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/fondowebsite.png') }}"
                class="w-full h-full object-cover opacity-60 scale-105 animate-pulse-slow" alt="Fondo">
            <!-- Modern Gradients -->
            <div class="absolute inset-0 bg-gradient-to-b from-obsidian-950 via-obsidian-950/80 to-obsidian-950"></div>
            <div
                class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gold-600/10 via-transparent to-transparent">
            </div>
        </div>

        <!-- Light Flares -->
        <div class="spotlight top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-60 blur-[100px]"></div>

        <!-- Content -->
        <div class="relative z-10 text-center px-4 max-w-7xl mx-auto flex flex-col items-center mt-10">

            <!-- Logos Distrito -->
            <div class="relative w-40 md:w-56 mx-auto mb-8 opacity-90 mix-blend-screen" data-aos="fade-down"
                data-aos-duration="1000">
                <img src="{{ asset('images/logos_distrito.png') }}" alt="Logos Distrito"
                    class="w-full h-auto grayscale contrast-125 hover:grayscale-0 transition duration-500">
            </div>

            <!-- Main Logo -->
            <div class="relative w-full max-w-4xl mx-auto -mb-12 z-20" data-aos="zoom-out" data-aos-duration="1500">
                <img src="{{ asset('images/camp_logo_2026.png') }}" alt="Campamento Juvenil 2026"
                    class="w-full h-auto drop-shadow-[0_0_50px_rgba(212,175,55,0.25)] animate-float-slow">
            </div>

            <!-- Countdown Timer -->
            <div data-aos="fade-up" data-aos-delay="500" class="mt-16 mb-12">
                <div class="flex items-center justify-center gap-4 mb-6">
                    <div class="h-[1px] w-12 bg-gold-500/50"></div>
                    <p class="text-gold-200 font-montserrat text-[10px] tracking-[0.5em] uppercase font-bold">Tiempo
                        Restante</p>
                    <div class="h-[1px] w-12 bg-gold-500/50"></div>
                </div>

                <div class="flex flex-wrap justify-center gap-4 md:gap-8" id="countdown">
                    <!-- JS Injected -->
                </div>
            </div>

            <!-- Buttons -->
            <div data-aos="fade-up" data-aos-delay="700"
                class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <a href="{{ route('registration') }}"
                    class="relative group px-12 py-4 bg-transparent overflow-hidden rounded-sm border border-gold-500/50 hover:border-gold-400 transition-colors">
                    <div
                        class="absolute inset-0 w-0 bg-gold-500/10 transition-all duration-[400ms] ease-out group-hover:w-full">
                    </div>
                    <span
                        class="relative z-10 text-gold-300 font-bold uppercase tracking-[0.25em] text-xs group-hover:text-gold-200 group-hover:shadow-[0_0_20px_rgba(212,175,55,0.6)] transition-all">
                        Reservar Cupo
                    </span>
                </a>

                <a href="https://wa.me/573113300389" target="_blank"
                    class="text-gray-400 hover:text-white flex items-center gap-3 text-[10px] font-bold uppercase tracking-[0.2em] transition-all group">
                    <i
                        class="fab fa-whatsapp text-lg text-emerald-500 group-hover:text-emerald-400 transition-colors"></i>
                    <span
                        class="border-b border-transparent group-hover:border-gray-500 pb-0.5 transition-all">Información</span>
                </a>
            </div>
        </div>
    </header>

    <!-- INTRO & VIDEO WRAPPER -->
    <div class="relative bg-obsidian-950 py-32 overflow-hidden border-t border-white/5">
        <div class="spotlight top-0 left-0 -translate-x-1/2 -translate-y-1/2 bg-blue-900/10"></div>
        <div class="spotlight bottom-0 right-0 translate-x-1/2 translate-y-1/2 bg-gold-600/10"></div>

        <div class="container mx-auto px-6 relative z-10 w-full">
            <div class="flex flex-col lg:flex-row items-center gap-20 w-full max-w-[95rem] mx-auto">

                <!-- Text Content -->
                <div class="lg:w-1/2 text-left" data-aos="fade-right">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gold-500/20 bg-gold-900/10 text-gold-400 text-[10px] font-black uppercase tracking-widest mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold-500 animate-pulse"></span> Manifiesto
                    </div>

                    <h2 class="text-4xl md:text-5xl lg:text-7xl font-cinzel text-white mb-8 leading-[1.1]">
                        ¿Qué es <br>
                        <span class="text-gold-liquid font-bold">INVESTIDOS?</span>
                    </h2>

                    <p class="text-lg text-gray-400 leading-relaxed mb-8 font-light border-l-2 border-gold-500/30 pl-8">
                        No es solo un evento, es una <strong class="text-gold-200 font-normal">convocatoria
                            divina</strong>.
                        INVESTIDOS 2026 es el tiempo kairos en el que la juventud del Distrito 27 se reúne para recibir
                        el poder y la investidura de Dios. Una experiencia inmersiva de tres días diseñada para
                        transformar tu eternidad.
                    </p>
                </div>

                <!-- Video Card -->
                <div class="lg:w-1/2 w-full" data-aos="fade-left">
                    <div
                        class="relative p-2 rounded-lg bg-gradient-to-br from-white/10 to-transparent backdrop-blur-sm border border-white/5">
                        <div class="relative rounded overflow-hidden aspect-video shadow-2xl shadow-black">
                            <video
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-1000 ease-out"
                                controls preload="metadata" poster="{{ asset('images/investidobanner.png') }}">
                                <source src="{{ asset('images/video-caamp.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>

                            <!-- Corner Accents -->
                            <div
                                class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-gold-500/80 pointer-events-none">
                            </div>
                            <div
                                class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-gold-500/80 pointer-events-none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BANNER PARALLAX -->
    <div class="relative py-48 bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/investidobanner.png') }}');">
        <!-- Multiple overlays for depth -->
        <div class="absolute inset-0 bg-obsidian-950/80"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-transparent to-obsidian-950"></div>

        <div class="relative container mx-auto text-center px-4 max-w-5xl z-10">
            <div class="mb-8 opacity-50">
                <i class="fas fa-quote-left text-5xl text-gold-500"></i>
            </div>

            <h2 class="text-2xl md:text-5xl lg:text-6xl font-cinzel text-gray-100 mb-8 leading-snug tracking-wide"
                data-aos="zoom-in">
                "Pero quedaos vosotros en la ciudad de Jerusalén, hasta que seáis <span
                    class="text-gold-400 italic font-medium relative inline-block">
                    investidos de poder
                    <span class="absolute bottom-1 left-0 w-full h-[2px] bg-gold-500/50 blur-[1px]"></span>
                </span> desde lo alto..."
            </h2>

            <div class="flex items-center justify-center gap-4">
                <div class="h-[1px] w-12 bg-gold-600/50"></div>
                <p class="text-gold-200/80 text-sm md:text-lg font-cinzel uppercase tracking-[0.4em]"
                    data-aos="fade-up">Lucas 24:49</p>
                <div class="h-[1px] w-12 bg-gold-600/50"></div>
            </div>
        </div>
    </div>

    <!-- INVITADOS (Dark & Elegant) -->
    <section id="invitados" class="py-32 relative bg-obsidian-950">
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-gold-500/20 to-transparent">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-24">
                <span
                    class="text-gold-500 text-[10px] font-bold uppercase tracking-[0.4em] border border-gold-500/20 px-4 py-2 rounded-full">Nuestros
                    Invitados</span>
                <h2 class="text-4xl md:text-6xl font-cinzel text-white mt-8 mb-6">Expositores</h2>
                <p class="text-gray-500 max-w-xl mx-auto font-light text-sm tracking-wide">Instrumentos escogidos por
                    Dios para impartir una
                    palabra que marcará a esta generación.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

                <!-- Card Design Refined -->
                <!-- Pastor Jhon Fabio -->
                <div class="group relative h-[550px] overflow-hidden cursor-pointer bg-obsidian-900 border border-white/5"
                    data-aos="fade-up">
                    <!-- Image -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/jhonfabio.png') }}" alt="Pastor Jhon Fabio"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 scale-100 group-hover:scale-110 transition-all duration-1000 ease-out">
                    </div>

                    <!-- Gradient Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-obsidian-950/40 to-transparent opacity-90 transition-opacity duration-500">
                    </div>

                    <!-- Content -->
                    <div
                        class="absolute bottom-0 left-0 w-full p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="flex items-center gap-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            <span class="h-[1px] w-8 bg-gold-500"></span>
                            <p class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em]">Expositor</p>
                        </div>
                        <h3 class="text-3xl font-cinzel text-white leading-tight mb-1">Jhon Fabio <br> García</h3>
                    </div>

                    <!-- Hover Border -->
                    <div
                        class="absolute inset-0 border border-gold-500/0 group-hover:border-gold-500/30 transition-all duration-500 pointer-events-none">
                    </div>
                </div>

                <!-- Pastor Michael Alvarez -->
                <div class="group relative h-[550px] overflow-hidden cursor-pointer bg-obsidian-900 border border-white/5"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/michaelalvarez.png') }}" alt="Pastor Michael Alvarez"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 scale-100 group-hover:scale-110 transition-all duration-1000 ease-out">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-obsidian-950/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="flex items-center gap-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            <span class="h-[1px] w-8 bg-gold-500"></span>
                            <p class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em]">Expositor</p>
                        </div>
                        <h3 class="text-3xl font-cinzel text-white leading-tight mb-1">Michael <br> Alvarez</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-gold-500/0 group-hover:border-gold-500/30 transition-all duration-500 pointer-events-none">
                    </div>
                </div>

                <!-- Adorador Juan Pablo -->
                <div class="group relative h-[550px] overflow-hidden cursor-pointer bg-obsidian-900 border border-white/5"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/juanpablo.png') }}" alt="Juan Pablo M."
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 scale-100 group-hover:scale-110 transition-all duration-1000 ease-out">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-obsidian-950/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="flex items-center gap-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            <span class="h-[1px] w-8 bg-gold-500"></span>
                            <p class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em]">Adoración</p>
                        </div>
                        <h3 class="text-3xl font-cinzel text-white leading-tight mb-1">Juan Pablo <br> M.</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-gold-500/0 group-hover:border-gold-500/30 transition-all duration-500 pointer-events-none">
                    </div>
                </div>

                <!-- Coro -->
                <div class="group relative h-[550px] overflow-hidden cursor-pointer bg-obsidian-900 border border-white/5"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/coro.png') }}" alt="Coro"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 scale-100 group-hover:scale-110 transition-all duration-1000 ease-out">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-obsidian-950/40 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="flex items-center gap-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            <span class="h-[1px] w-8 bg-gold-500"></span>
                            <p class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em]">Alabanza</p>
                        </div>
                        <h3 class="text-3xl font-cinzel text-white leading-tight mb-1">Coro <br> Distrito 27</h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-gold-500/0 group-hover:border-gold-500/30 transition-all duration-500 pointer-events-none">
                    </div>
                </div>

                <!-- Conquistadores -->
                <div class="group relative h-[550px] overflow-hidden cursor-pointer md:col-span-2 lg:col-span-2 bg-obsidian-900 border border-white/5"
                    data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute inset-0">
                        <img src="{{ asset('images/conquistadores.png') }}" alt="Conquistadores"
                            class="w-full h-full object-cover object-top grayscale group-hover:grayscale-0 scale-100 group-hover:scale-105 transition-all duration-1000 ease-out">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-obsidian-950 via-obsidian-950/60 to-transparent opacity-90">
                    </div>

                    <div
                        class="absolute bottom-0 left-0 w-full p-10 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="flex items-center gap-3 mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            <span class="h-[1px] w-8 bg-gold-500"></span>
                            <p class="text-gold-400 text-[10px] font-bold uppercase tracking-[0.2em]">Organizadores</p>
                        </div>
                        <h3 class="text-3xl font-cinzel text-white leading-tight mb-1">Conquistadores <br> Pentecostales
                        </h3>
                    </div>
                    <div
                        class="absolute inset-0 border border-gold-500/0 group-hover:border-gold-500/30 transition-all duration-500 pointer-events-none">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Agenda (Clean Minimalist Line) -->
    <section id="Agenda" class="py-32 relative bg-obsidian-950 overflow-hidden">
        <div class="absolute right-0 top-1/3 w-[500px] h-[500px] bg-gold-500/5 rounded-full blur-[120px]"></div>

        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="flex flex-col items-center mb-24 text-center">
                <i class="fas fa-hourglass-half text-2xl text-gold-500 mb-6 opacity-80"></i>
                <h2 class="text-4xl md:text-6xl font-cinzel text-white">Agenda</h2>
                <div class="h-[1px] w-24 bg-gold-500/30 mt-8 mb-4"></div>
                <p class="text-gray-500 text-xs italic tracking-widest">Sujeto a la dirección del Espíritu Santo</p>
            </div>

            <div class="relative">
                <!-- Vertical Line -->
                <div
                    class="absolute left-6 md:left-1/2 transform md:-translate-x-1/2 h-full w-[1px] bg-gradient-to-b from-transparent via-gold-500/30 to-transparent">
                </div>

                <div class="space-y-20">

                    <!-- Sábado -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-16 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-2xl font-cinzel text-white group-hover:text-gold-300 transition duration-300">
                                Sábado 16 Mayo</h3>
                            <span
                                class="text-gold-600 font-bold text-[10px] tracking-[0.2em] uppercase mb-3 block">Apertura</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Registro de delegaciones y
                                servicio de apertura.</p>
                        </div>

                        <!-- Dot -->
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-obsidian-950 border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:scale-125 transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0.4)]">
                        </div>

                        <div class="md:w-1/2 md:pl-16 hidden md:block opacity-10 text-8xl text-transparent stroke-text font-cinzel"
                            data-aos="fade-left" style="-webkit-text-stroke: 1px #D4AF37;">01</div>
                    </div>

                    <!-- Domingo AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-16 hidden md:block opacity-10 text-8xl text-transparent text-right font-cinzel"
                            data-aos="fade-right" style="-webkit-text-stroke: 1px #D4AF37;">02</div>

                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-obsidian-950 border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:scale-125 transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0.4)]">
                        </div>

                        <div class="md:w-1/2 md:pl-16 pl-20 w-full" data-aos="fade-left">
                            <h3
                                class="text-2xl font-cinzel text-white group-hover:text-gold-300 transition duration-300">
                                Domingo - 8:00 AM</h3>
                            <span
                                class="text-gold-600 font-bold text-[10px] tracking-[0.2em] uppercase mb-3 block">Mañana
                                de Gloria</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Devocional General, Culto de
                                avivamiento y taller.</p>
                        </div>
                    </div>

                    <!-- Domingo PM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-16 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-2xl font-cinzel text-white group-hover:text-gold-300 transition duration-300">
                                Domingo - 2:00 PM</h3>
                            <span
                                class="text-gold-600 font-bold text-[10px] tracking-[0.2em] uppercase mb-3 block">Actividades</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Esparcimiento, desafíos
                                dirigidos y campeonatos.</p>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-obsidian-950 border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:scale-125 transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-16 hidden md:block opacity-10 text-8xl text-transparent stroke-text font-cinzel"
                            data-aos="fade-left" style="-webkit-text-stroke: 1px #D4AF37;">03</div>
                    </div>

                    <!-- Domingo Noche (Destacado) -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group py-4">
                        <div class="md:w-1/2 md:pr-16 hidden md:block text-right" data-aos="fade-right">
                            <i class="fas fa-fire text-4xl text-gold-500 animate-pulse-glow"></i>
                        </div>

                        <!-- Big glowing dot -->
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-6 h-6 bg-gold-500 rounded-full border-[3px] border-obsidian-950 z-20 shadow-[0_0_30px_rgba(212,175,55,0.8)]">
                        </div>

                        <div class="md:w-1/2 md:pl-16 pl-20 w-full" data-aos="fade-left">
                            <h3 class="text-3xl font-cinzel text-gold-liquid font-bold">NOCHE DE INVESTIDURA</h3>
                            <span class="text-white font-bold text-[10px] tracking-[0.2em] uppercase mb-3 block">Domingo
                                - 7:00 PM</span>
                            <p
                                class="text-gray-300 font-light text-sm leading-relaxed border-l-2 border-gold-500/50 pl-4">
                                Adoración, culto de restauración y renovación espiritual.</p>
                        </div>
                    </div>

                    <!-- Lunes AM -->
                    <div class="relative flex flex-col md:flex-row items-center w-full group">
                        <div class="md:w-1/2 md:pr-16 md:text-right pl-20 md:pl-0 w-full" data-aos="fade-right">
                            <h3
                                class="text-2xl font-cinzel text-white group-hover:text-gold-300 transition duration-300">
                                Lunes - 8:00 AM</h3>
                            <span
                                class="text-gold-600 font-bold text-[10px] tracking-[0.2em] uppercase mb-3 block">Cierre
                                y Santa Cena</span>
                            <p class="text-gray-400 font-light text-sm leading-relaxed">Adoración y Servicio de
                                clausura.</p>
                        </div>
                        <div
                            class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-3 h-3 bg-obsidian-950 border border-gold-500 rotate-45 z-10 group-hover:bg-gold-500 group-hover:scale-125 transition-all duration-300 shadow-[0_0_15px_rgba(212,175,55,0.4)]">
                        </div>
                        <div class="md:w-1/2 md:pl-16 hidden md:block opacity-10 text-8xl text-transparent stroke-text font-cinzel"
                            data-aos="fade-left" style="-webkit-text-stroke: 1px #D4AF37;">04</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- INVERSION -->
    <section id="inversion" class="py-32 relative bg-obsidian-950 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-gold-900/10 to-transparent"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-20">
                <span class="text-gray-500 uppercase tracking-[0.3em] text-[10px] font-bold">Reserva tu lugar</span>
                <h2 class="text-4xl md:text-6xl font-cinzel text-white mt-4">Planes de Inversión</h2>
            </div>

            <div class="flex flex-col lg:flex-row justify-center items-center gap-10 max-w-5xl mx-auto">

                <!-- Plan Parcial -->
                <div class="w-full lg:w-5/12 glass-premium rounded-sm p-10 hover:-translate-y-2 transition duration-500 relative group"
                    data-aos="fade-up">
                    <div class="text-center mb-10">
                        <h3 class="text-lg font-montserrat text-gray-400 uppercase tracking-[0.2em] font-semibold">
                            Estadía Parcial</h3>
                        <div class="flex justify-center items-baseline gap-1 mt-6">
                            <span class="text-xl text-gold-600">$</span>
                            <span class="text-5xl font-cinzel text-white tracking-tight">
                                @if(class_exists('App\Models\GlobalSetting'))
                                    {{ number_format(\App\Models\GlobalSetting::get('partial_stay_cost', 120000), 0) }}
                                @else
                                    120.000
                                @endif
                            </span>
                        </div>
                        <p class="text-[10px] text-gray-600 mt-2 uppercase tracking-widest">Un solo día</p>
                    </div>

                    <ul class="space-y-5 mb-10 text-gray-400 text-sm font-light">
                        <li class="flex items-center gap-4"><i class="fas fa-check text-gold-500 text-xs"></i> Entrada a
                            conferencias</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check text-gold-500 text-xs"></i> Material
                            de apoyo</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check text-gold-500 text-xs"></i> Almuerzo
                            y cena (1 día)</li>
                        <li class="flex items-center gap-4"><i class="fas fa-check text-gold-500 text-xs"></i> Tarde de
                            esparcimiento</li>
                    </ul>

                    <a href="{{ route('registration') }}"
                        class="block w-full py-4 border border-white/10 bg-white/5 hover:bg-white/10 hover:border-gold-500/50 rounded-sm text-center text-gray-300 hover:text-white transition uppercase text-[10px] tracking-[0.2em] font-bold">
                        Seleccionar
                    </a>
                </div>

                <!-- Plan Full (Highlighted) -->
                <div class="w-full lg:w-6/12 relative group" data-aos="fade-up" data-aos-delay="100">
                    <!-- Glow Border -->
                    <div
                        class="absolute -inset-[2px] bg-gradient-to-b from-gold-400 via-gold-600 to-transparent rounded opacity-20 blur-sm group-hover:opacity-40 transition duration-500">
                    </div>

                    <div
                        class="relative bg-obsidian-900 border border-gold-500/20 rounded p-12 overflow-hidden h-full shadow-2xl">

                        <!-- Badge -->
                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 bg-gradient-to-r from-gold-500 to-gold-400 text-black text-[9px] font-black uppercase tracking-[0.3em] px-6 py-2 rounded-b shadow-[0_4px_20px_rgba(212,175,55,0.4)]">
                            Recomendado
                        </div>

                        <div class="text-center mb-10 mt-6">
                            <h3 class="text-2xl font-cinzel text-gold-300 uppercase tracking-widest">Investidura Total
                            </h3>
                            <div class="flex justify-center items-baseline gap-1 mt-6">
                                <span class="text-2xl text-gold-600">$</span>
                                <span class="text-7xl font-cinzel text-white tracking-tight drop-shadow-lg">
                                    @if(class_exists('App\Models\GlobalSetting'))
                                        {{ number_format(\App\Models\GlobalSetting::get('default_total_cost', 300000), 0) }}
                                    @else
                                        300.000
                                    @endif
                                </span>
                            </div>
                            <p class="text-[10px] font-bold text-gray-500 mt-3 uppercase tracking-[0.3em]">Experiencia
                                Completa</p>
                        </div>

                        <div class="space-y-6 mb-12 pl-6 border-l border-gold-500/10 ml-6">
                            <div class="flex items-start gap-4 group/item">
                                <div
                                    class="w-5 h-5 rounded-full border border-gold-500/30 flex items-center justify-center shrink-0 mt-0.5 group-hover/item:bg-gold-500 group-hover/item:border-gold-500 transition-colors">
                                    <i class="fas fa-check text-[10px] text-gold-400 group-hover/item:text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm uppercase tracking-wide">Acceso Total 3 Días
                                    </h4>
                                    <p class="text-gray-500 text-xs mt-1">Todas las plenarias y talleres.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 group/item">
                                <div
                                    class="w-5 h-5 rounded-full border border-gold-500/30 flex items-center justify-center shrink-0 mt-0.5 group-hover/item:bg-gold-500 group-hover/item:border-gold-500 transition-colors">
                                    <i class="fas fa-check text-[10px] text-gold-400 group-hover/item:text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm uppercase tracking-wide">Hospedaje en Cabaña
                                    </h4>
                                    <p class="text-gray-500 text-xs mt-1">Alojamiento cómodo incluido.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 group/item">
                                <div
                                    class="w-5 h-5 rounded-full border border-gold-500/30 flex items-center justify-center shrink-0 mt-0.5 group-hover/item:bg-gold-500 group-hover/item:border-gold-500 transition-colors">
                                    <i class="fas fa-check text-[10px] text-gold-400 group-hover/item:text-black"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-sm uppercase tracking-wide">Alimentación
                                        Completa</h4>
                                    <p class="text-gray-500 text-xs mt-1">Desde el sábado hasta el lunes.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 group/item">
                                <div
                                    class="w-5 h-5 rounded-full border border-gold-500/30 flex items-center justify-center shrink-0 mt-0.5 group-hover/item:bg-gold-500 group-hover/item:border-gold-500 transition-colors">
                                    <i class="fas fa-star text-[10px] text-gold-400 group-hover/item:text-black"></i>
                                </div>
                                <span class="text-gold-200 text-sm font-bold uppercase tracking-wide">Kit de Bienvenida
                                    Premium</span>
                            </div>
                        </div>

                        <a href="{{ route('registration') }}"
                            class="block w-full py-5 bg-gradient-to-r from-gold-500 to-gold-600 hover:from-gold-400 hover:to-gold-500 rounded-sm text-center text-black font-black uppercase text-[11px] tracking-[0.25em] shadow-[0_0_30px_rgba(212,175,55,0.3)] hover:shadow-[0_0_40px_rgba(212,175,55,0.5)] transition-all transform hover:-translate-y-1">
                            Inscribirme Ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER (Dark Anchoring) -->
    <footer class="bg-black pt-24 pb-12 border-t border-white/5 relative overflow-hidden">

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start gap-16">

                <div class="md:w-1/3">
                    <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco" class="h-12 mb-8 opacity-90">
                    <p class="text-gray-500 text-xs leading-relaxed font-light tracking-wide uppercase">
                        Campamento Juvenil 2026.<br>
                        Distrito 27 - Iglesia Pentecostal Unida de Colombia.
                    </p>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-gold-500 font-cinzel font-bold mb-8 text-lg">Contacto</h3>
                    <ul class="space-y-4 text-gray-400 text-sm font-light">
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <i class="fas fa-phone text-xs text-gold-600"></i>
                            <span class="tracking-wider">311 330 0389</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <i class="fas fa-mobile-alt text-xs text-gold-600"></i>
                            <span class="tracking-wider">313 277 7477</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <i class="fas fa-envelope text-xs text-gold-600"></i>
                            <span class="tracking-wider">conquistadoresdt27@gmail.com</span>
                        </li>
                    </ul>
                </div>

                <div class="md:w-1/3">
                    <h3 class="text-gold-500 font-cinzel font-bold mb-8 text-lg">Síguenos</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/share/17yXzxdwEL/" target="_blank"
                            class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/conquistadoresd27" target="_blank"
                            class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:border-pink-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@conquistadorespentecostawy8tm" target="_blank"
                            class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-gray-400 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://whatsapp.com/channel/0029Vb29KYMDDmFP0H0gWs2x" target="_blank"
                            class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-gray-400 hover:bg-green-600 hover:border-green-600 hover:text-white transition-all duration-300"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-white/5 mt-20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] text-gray-600 uppercase tracking-widest">
                <p>&copy; 2026 Conquistadores Pentecostales Distrito 27.</p>
                <p>Desarrollado por <a href="https://wa.me/573004200048"
                        class="text-gold-600 hover:text-white transition">Kaled Molina</a></p>
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

            // Refined Mechanical Time Box Design
            const timeBoxClass = "flex flex-col items-center justify-center w-16 h-16 md:w-20 md:h-20 border-t border-b border-gold-500/30 bg-gradient-to-b from-white/5 to-transparent";
            const numberClass = "text-2xl md:text-4xl font-cinzel font-bold text-white leading-none drop-shadow-[0_0_10px_rgba(255,255,255,0.3)]";
            const labelClass = "text-[9px] text-gold-500 uppercase tracking-[0.2em] mt-2";

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