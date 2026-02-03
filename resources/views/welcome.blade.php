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
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Cinzel:wght@400;500;600;700;800&display=swap"
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
                            50: '#FFFDE7',
                            100: '#FFF9C4',
                            200: '#FFF59D',
                            300: '#FFF176',
                            400: '#FFEE58',
                            500: '#FFD54F',
                            600: '#FBC02D',
                            700: '#F9A825',
                            800: '#F57F17',
                            900: '#F57C00',
                        },
                        fire: {
                            50: '#FFF3E0',
                            500: '#FF9800',
                            600: '#FB8C00',
                            700: '#F57C00',
                        },
                        dark: {
                            900: '#0A0A0A',
                            800: '#1A1A1A',
                            700: '#2A2A2A',
                            600: '#3A3A3A',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'shimmer': 'shimmer 2s infinite',
                        'gradient': 'gradient 3s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            'from': { boxShadow: '0 0 20px rgba(255, 215, 0, 0.4)' },
                            'to': { boxShadow: '0 0 30px rgba(255, 215, 0, 0.8)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-200px 0' },
                            '100%': { backgroundPosition: 'calc(200px + 100%) 0' },
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' },
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                        'hero-gradient': 'linear-gradient(135deg, rgba(10,10,10,0.95) 0%, rgba(26,15,0,0.9) 50%, rgba(10,10,10,0.95) 100%)',
                        'gold-gradient': 'linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF8C00 100%)',
                        'fire-gradient': 'linear-gradient(135deg, #FF4500 0%, #FF8C00 50%, #FFD700 100%)',
                        'dark-gradient': 'linear-gradient(135deg, #0A0A0A 0%, #1A1A1A 50%, #2A2A2A 100%)',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #0A0A0A;
            color: #ffffff;
            overflow-x: hidden;
            font-synthesis: none;
        }

        /* Mejorado: Efecto de Texto Dorado */
        .text-gradient-gold {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 25%, #FF8C00 50%, #FFA500 75%, #FFD700 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: gradient 3s ease infinite;
        }

        /* Modern Glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 215, 0, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.36);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        /* Efecto de partículas doradas */
        .gold-particles {
            position: relative;
            overflow: hidden;
        }

        .gold-particles::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            animation: float 20s linear infinite;
            pointer-events: none;
        }

        /* Mejor scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: linear-gradient(180deg, #1A1A1A 0%, #2A2A2A 100%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #FFD700 0%, #FFA500 100%);
            border-radius: 10px;
            border: 2px solid #1A1A1A;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #FFA500 0%, #FF8C00 100%);
        }

        /* Efecto de borde animado */
        .animated-border {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
        }

        .animated-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #FFD700, #FFA500, #FF8C00, #FFD700);
            background-size: 400% 400%;
            z-index: -1;
            animation: gradient 3s ease infinite;
            border-radius: 18px;
            filter: blur(10px);
            opacity: 0.7;
        }

        /* Efecto de texto brillante */
        .text-shimmer {
            background: linear-gradient(90deg, #FFD700 0%, #FFA500 50%, #FFD700 100%);
            background-size: 200% auto;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 2s linear infinite;
        }

        /* Grid pattern sutil */
        .grid-pattern {
            background-image:
                linear-gradient(rgba(255, 215, 0, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 215, 0, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Mejor noise texture */
        .bg-noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 9999;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Navbar mejorado */
        .nav-glass {
            background: rgba(10, 10, 10, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        }

        .nav-glass.scrolled {
            background: rgba(26, 15, 0, 0.95);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        /* Hero section mejorada */
        .hero-overlay {
            background: linear-gradient(180deg,
                    rgba(10, 10, 10, 0.8) 0%,
                    rgba(26, 15, 0, 0.6) 50%,
                    rgba(10, 10, 10, 0.9) 100%);
        }

        /* Timeline mejorado */
        .timeline-line {
            background: linear-gradient(180deg,
                    transparent 0%,
                    rgba(255, 215, 0, 0.3) 50%,
                    transparent 100%);
            width: 3px;
        }

        /* Button modern */
        .btn-modern {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            color: #000;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 50px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 20px rgba(255, 215, 0, 0.3);
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(255, 215, 0, 0.5);
            background: linear-gradient(135deg, #FFA500 0%, #FF8C00 100%);
        }

        .btn-modern::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-modern:hover::after {
            left: 100%;
        }

        /* Card hover effects */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
        }

        /* Gradient text animation */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: calc(200px + 100%) 0;
            }
        }
    </style>
</head>

<body class="font-montserrat antialiased selection:bg-gold-500 selection:text-black">
    <div class="bg-noise"></div>

    <!-- NAVIGATION MEJORADA -->
    <nav id="navbar" class="nav-glass fixed w-full z-50 transition-all duration-300 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo mejorado -->
            <a href="#" class="text-2xl font-bold flex items-center gap-3 group">
                <div class="relative">
                    <img src="{{ asset('images/INVESTIDOS.png') }}" alt="Logo"
                        class="h-12 md:h-16 transition-all duration-500 group-hover:scale-110 group-hover:rotate-3">
                    <div
                        class="absolute inset-0 bg-gold-500/20 blur-xl group-hover:blur-2xl transition-all duration-500">
                    </div>
                </div>
                <span class="hidden md:block text-xl font-cinzel text-gradient-gold tracking-wider">INVESTIDOS
                    2026</span>
            </a>

            <!-- Desktop Menu modernizado -->
            <div class="hidden md:flex space-x-2 items-center">
                <a href="#inicio"
                    class="px-6 py-3 text-gray-300 hover:text-gold-500 text-sm uppercase tracking-widest transition-all duration-300 font-medium hover:bg-white/5 rounded-full group">
                    <i class="fas fa-home mr-2"></i>
                    <span class="relative">
                        Inicio
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
                <a href="#invitados"
                    class="px-6 py-3 text-gray-300 hover:text-gold-500 text-sm uppercase tracking-widest transition-all duration-300 font-medium hover:bg-white/5 rounded-full group">
                    <i class="fas fa-users mr-2"></i>
                    <span class="relative">
                        Invitados
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
                <a href="#cronograma"
                    class="px-6 py-3 text-gray-300 hover:text-gold-500 text-sm uppercase tracking-widest transition-all duration-300 font-medium hover:bg-white/5 rounded-full group">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span class="relative">
                        Agenda
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
                <a href="#inversion"
                    class="px-6 py-3 text-gray-300 hover:text-gold-500 text-sm uppercase tracking-widest transition-all duration-300 font-medium hover:bg-white/5 rounded-full group">
                    <i class="fas fa-tag mr-2"></i>
                    <span class="relative">
                        Inversión
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
                <a href="/consulta"
                    class="px-6 py-3 text-gray-300 hover:text-gold-500 text-sm uppercase tracking-widest transition-all duration-300 font-medium hover:bg-white/5 rounded-full group">
                    <i class="fas fa-question-circle mr-2"></i>
                    <span class="relative">
                        Consulta
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gold-500 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </a>
            </div>

            <!-- CTA Button modernizado -->
            <a href="/registro"
                class="hidden md:inline-block btn-modern font-bold text-sm tracking-wider transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-fire mr-2"></i>INSCRIBIRME
            </a>

            <!-- Mobile Menu Button mejorado -->
            <button id="mobile-menu-btn"
                class="md:hidden text-2xl text-white hover:text-gold-500 transition-all duration-300">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- HERO SECTION MEJORADA -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden gold-particles">
        <!-- Background Image mejorado -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/fondowebsite.png') }}"
                class="w-full h-full object-cover opacity-100 scale-110 animate-pulse-slow blur-sm" alt="Fondo">
            <div class="absolute inset-0 hero-overlay"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-dark-900 via-transparent to-transparent"></div>
        </div>

        <!-- Content mejorado -->
        <div class="relative z-10 text-center px-4 max-w-6xl mx-auto mt-20 md:mt-0">
            <!-- Logo Image con efectos mejorados -->
            <div class="relative w-full max-w-2xl mx-auto px-4 mb-4" data-aos="zoom-in" data-aos-duration="1500">
                <div class="relative">
                    <img src="{{ asset('images/camp_logo_2026.png') }}" alt="Campamento Juvenil 2026"
                        class="w-full h-auto drop-shadow-[0_0_40px_rgba(212,175,55,0.6)] hover:drop-shadow-[0_0_60px_rgba(212,175,55,0.8)] transition-all duration-700 transform hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-gold-500/10 to-transparent blur-xl animate-pulse">
                    </div>
                </div>
            </div>

            <!-- Logos Distrito Image -->
            <div class="relative w-full max-w-xl mx-auto px-4 mb-8" data-aos="fade-up" data-aos-delay="500">
                <div class="glass-card rounded-2xl p-6">
                    <img src="{{ asset('images/logos_distrito.png') }}" alt="Logos Distrito"
                        class="w-full h-auto opacity-90 hover:opacity-100 transition-opacity duration-500">
                </div>
            </div>

            <!-- Countdown mejorado -->
            <p data-aos="fade-up" data-aos-delay="600"
                class="text-gold-500 font-cinzel text-sm md:text-base tracking-[0.4em] uppercase mb-4 font-bold text-shimmer">
                ⚡ CUENTA REGRESIVA ⚡
            </p>

            <!-- Countdown Timer modernizado -->
            <div data-aos="fade-up" data-aos-delay="700" class="flex flex-wrap justify-center gap-4 md:gap-8 mb-12"
                id="countdown">
                <!-- Se llena con JS -->
            </div>

            <!-- CTA Buttons mejorados -->
            <div data-aos="fade-up" data-aos-delay="900"
                class="flex flex-col md:flex-row justify-center items-center gap-6">
                <a href="{{ route('registration') }}"
                    class="group relative px-10 py-5 bg-transparent border-2 border-gold-500 text-gold-500 font-bold uppercase tracking-widest overflow-hidden rounded-xl transition-all hover:text-black hover:border-gold-500">
                    <div
                        class="absolute inset-0 w-0 bg-gradient-to-r from-gold-500 to-gold-600 transition-all duration-500 ease-out group-hover:w-full">
                    </div>
                    <span class="relative z-10 flex items-center gap-3">
                        <i class="fas fa-crown"></i>
                        Reservar Cupo
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </span>
                </a>
                <a href="https://wa.me/573113300389" target="_blank"
                    class="group px-8 py-4 glass-card rounded-xl hover:bg-white/10 transition-all duration-300">
                    <span class="text-white flex items-center gap-3 text-base">
                        <i
                            class="fab fa-whatsapp text-2xl text-green-500 group-hover:scale-110 transition-transform"></i>
                        <span>
                            <span class="block text-sm text-gray-400">¿Dudas?</span>
                            <span class="font-bold">Más Información</span>
                        </span>
                    </span>
                </a>
            </div>

            <!-- Stats preview -->
            <div data-aos="fade-up" data-aos-delay="1100"
                class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                <div class="glass-card p-4 rounded-xl text-center">
                    <div class="text-2xl font-bold text-gold-500">3</div>
                    <div class="text-sm text-gray-400">Días</div>
                </div>
                <div class="glass-card p-4 rounded-xl text-center">
                    <div class="text-2xl font-bold text-gold-500">5+</div>
                    <div class="text-sm text-gray-400">Expositores</div>
                </div>
                <div class="glass-card p-4 rounded-xl text-center">
                    <div class="text-2xl font-bold text-gold-500">100%</div>
                    <div class="text-sm text-gray-400">Espiritual</div>
                </div>
                <div class="glass-card p-4 rounded-xl text-center">
                    <div class="text-2xl font-bold text-gold-500">∞</div>
                    <div class="text-sm text-gray-400">Bendición</div>
                </div>
            </div>
        </div>

        <!-- Scroll Down Indicator mejorado -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
            <div class="animate-bounce flex flex-col items-center">
                <span class="text-xs text-gray-500 mb-2">Descubre más</span>
                <i class="fas fa-chevron-down text-gold-500 text-xl"></i>
            </div>
        </div>

        <!-- Wave Divider modernizado -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] z-10">
            <svg class="relative block w-[calc(111%_+_1.3px)] h-[80px]" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="fill-gold-900"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="fill-gold-800"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="fill-dark-900"></path>
            </svg>
        </div>
    </header>

    <!-- INTRODUCCIÓN MODERNIZADA -->
    <section class="py-24 relative overflow-hidden">
        <!-- Fondo modernizado -->
        <div class="absolute inset-0 bg-dark-gradient"></div>
        <div class="absolute inset-0 grid-pattern"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gold-500/5 to-transparent"></div>

        <!-- Elementos decorativos -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-gold-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-fire-500/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 text-center max-w-4xl relative z-10">
            <div class="inline-block p-4 rounded-2xl glass-card mb-8" data-aos="fade-down">
                <i class="fas fa-fire text-4xl text-gradient-gold"></i>
            </div>
            <h2 class="text-4xl md:text-6xl font-cinzel font-bold text-white mb-8" data-aos="fade-up">
                ¿Qué es <span class="text-gradient-gold">INVESTIDOS</span>?
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed mb-12 px-4 md:px-0" data-aos="fade-up" data-aos-delay="200">
                No es solo un evento, es una <strong class="text-gold-400">convocatoria divina</strong>. INVESTIDOS 2026
                es el tiempo en el que
                la juventud del Distrito 27 se reúne para recibir el poder y la investidura de Dios, que transforma
                vidas y generaciones. Prepárate para tres días únicos que marcarán tu vida para siempre.
            </p>
            <div class="flex justify-center gap-6" data-aos="fade-up" data-aos-delay="400">
                <div class="w-32 h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent rounded-full"></div>
                <div class="w-8 h-8 rounded-full border-2 border-gold-500 animate-pulse"></div>
                <div class="w-32 h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- VIDEO OFICIAL MEJORADO -->
    <section class="py-16 bg-dark-900 relative overflow-hidden">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-cinzel text-white mb-4" data-aos="fade-up">Video Oficial</h3>
                <p class="text-gray-400" data-aos="fade-up" data-aos-delay="200">Mira la visión detrás de INVESTIDOS
                    2026</p>
            </div>

            <div class="relative rounded-3xl overflow-hidden shadow-2xl animated-border" data-aos="zoom-in">
                <div class="absolute inset-0 bg-gradient-to-br from-gold-500/20 to-transparent blur-xl"></div>
                <video class="w-full h-auto relative z-10" controls preload="metadata"
                    poster="{{ asset('images/investidobanner.png') }}">
                    <source src="{{ asset('images/video-caamp.mp4') }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
                <!-- Play button overlay -->
                <div
                    class="absolute inset-0 flex items-center justify-center z-20 opacity-0 hover:opacity-100 transition-opacity duration-300">
                    <div class="w-20 h-20 rounded-full bg-gold-500/90 flex items-center justify-center">
                        <i class="fas fa-play text-2xl text-black"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BANNER PARALLAX MEJORADO -->
    <div class="relative py-40 bg-fixed bg-center bg-cover overflow-hidden"
        style="background-image: url('{{ asset('images/investidobanner.png') }}');">
        <!-- Overlay mejorado -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/80"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gold-500/10 to-transparent"></div>

        <!-- Elementos decorativos -->
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-gold-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-10 w-48 h-48 bg-fire-500/20 rounded-full blur-3xl"></div>

        <div class="relative container mx-auto text-center px-4 z-10">
            <div class="inline-block p-2 rounded-full border border-gold-500/30 mb-8" data-aos="fade-down">
                <i class="fas fa-quote-left text-2xl text-gold-500"></i>
            </div>
            <h2 class="text-4xl md:text-6xl font-black font-cinzel leading-tight text-white mb-8 drop-shadow-2xl"
                data-aos="zoom-in">
                "Pero quedaos vosotros en la ciudad de Jerusalén, hasta que seáis investidos de poder desde lo alto..."
            </h2>
            <p class="text-2xl font-cinzel text-gradient-gold" data-aos="fade-up">Lucas 24:49</p>

            <!-- Verse decoration -->
            <div class="mt-12 flex justify-center gap-4" data-aos="fade-up" data-aos-delay="400">
                <div class="w-6 h-6 rotate-45 border-2 border-gold-500"></div>
                <div class="w-6 h-6 rotate-45 border-2 border-gold-500"></div>
                <div class="w-6 h-6 rotate-45 border-2 border-gold-500"></div>
            </div>
        </div>

        <!-- Wave Divider mejorado -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
            <svg class="relative block w-full h-[100px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="fill-dark-900"></path>
            </svg>
        </div>
    </div>

    <!-- INVITADOS MODERNIZADO -->
    <section id="invitados" class="py-24 bg-dark-900 relative overflow-hidden">
        <!-- Fondo moderno -->
        <div class="absolute inset-0 bg-gradient-to-b from-dark-900 via-dark-800 to-dark-900"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(255,215,0,0.1),transparent_50%)]"></div>

        <!-- Elementos decorativos -->
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-gold-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-fire-500/10 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Header modernizado -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-8 h-0.5 bg-gold-500"></div>
                    <span class="text-gold-500 font-bold uppercase tracking-widest text-sm">Conoce a los</span>
                    <div class="w-8 h-0.5 bg-gold-500"></div>
                </div>
                <h2 class="text-5xl md:text-7xl font-cinzel font-bold text-white mb-4">
                    <span class="text-gradient-gold">Expositores</span>
                </h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto">Siervos ungidos que compartirán la Palabra de Dios
                </p>
            </div>

            <!-- Grid de invitados modernizado -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

                <!-- Card template modernizada -->
                <div class="group card-hover" data-aos="fade-up">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden glass-card">
                        <!-- Image container -->
                        <div class="absolute inset-0">
                            <img src="{{ asset('images/michaelalvarez.png') }}" alt="Pastor Michael Alvarez"
                                class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                        </div>

                        <!-- Content overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                                    <i class="fas fa-microphone text-gold-500"></i>
                                </div>
                                <span class="text-gold-400 font-bold uppercase tracking-widest text-xs">Expositor</span>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-2">
                                Pastor <br>
                                <span class="text-gradient-gold">Michael Alvarez</span>
                            </h3>
                            <div
                                class="h-0.5 w-16 bg-gradient-to-r from-gold-500 to-transparent group-hover:w-full transition-all duration-500">
                            </div>
                        </div>

                        <!-- Hover effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gold-500/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>
                </div>

                <!-- Repetir estructura para cada invitado -->
                <div class="group card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden glass-card">
                        <div class="absolute inset-0">
                            <img src="{{ asset('images/juanpablo.png') }}" alt="Adorador Juan Pablo M."
                                class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                                    <i class="fas fa-music text-gold-500"></i>
                                </div>
                                <span class="text-gold-400 font-bold uppercase tracking-widest text-xs">Adoración</span>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-2">
                                Adorador <br>
                                <span class="text-gradient-gold">Juan Pablo M.</span>
                            </h3>
                            <div
                                class="h-0.5 w-16 bg-gradient-to-r from-gold-500 to-transparent group-hover:w-full transition-all duration-500">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="group card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative h-[400px] rounded-3xl overflow-hidden glass-card">
                        <div class="absolute inset-0">
                            <img src="{{ asset('images/coro.png') }}" alt="Coro Distrito 27"
                                class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                                    <i class="fas fa-users text-gold-500"></i>
                                </div>
                                <span class="text-gold-400 font-bold uppercase tracking-widest text-xs">Alabanza</span>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-2">
                                Coro <br>
                                <span class="text-gradient-gold">Distrito 27</span>
                            </h3>
                            <div
                                class="h-0.5 w-16 bg-gradient-to-r from-gold-500 to-transparent group-hover:w-full transition-all duration-500">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Nota al pie -->
            <div class="text-center mt-16" data-aos="fade-up">
                <p class="text-gray-500 italic">Y muchos más siervos de Dios...</p>
                <div class="mt-6 flex justify-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-gold-500"></div>
                    <div class="w-2 h-2 rounded-full bg-gold-500"></div>
                    <div class="w-2 h-2 rounded-full bg-gold-500"></div>
                </div>
            </div>
        </div>

        <!-- Wave Divider modernizado -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
            <svg class="relative block w-full h-[80px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M0,0V7.23C149.93,60.46,314.09,72.78,475.83,44.03c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,78.57,886,96.59,951.2,91.37c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="fill-dark-800"></path>
            </svg>
        </div>
    </section>

    <!-- CRONOGRAMA MODERNIZADO -->
    <section id="cronograma" class="py-24 bg-dark-800 relative overflow-hidden">
        <!-- Fondo moderno -->
        <div class="absolute inset-0 bg-gradient-to-b from-dark-800 via-dark-900 to-dark-800"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=" 100" height="100" viewBox="0 0 100 100"
            xmlns="http://www.w3.org/2000/svg" %3E%3Cpath
            d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z"
            fill="%23FFD700" fill-opacity="0.05" fill-rule="evenodd" /%3E%3C/svg%3E')] opacity-10"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Header modernizado -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-4 mb-6">
                    <i class="fas fa-calendar-alt text-3xl text-gold-500"></i>
                    <h2 class="text-5xl md:text-6xl font-cinzel font-bold text-white">Cronograma</h2>
                </div>
                <p class="text-gray-400 text-lg">Agenda guiada por la dirección del Espíritu Santo</p>
            </div>

            <!-- Timeline modernizado -->
            <div class="relative max-w-4xl mx-auto">
                <!-- Línea central mejorada -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 h-full timeline-line">
                </div>

                <!-- Items del timeline -->
                <div class="space-y-12">

                    <!-- Item 1 -->
                    <div class="relative" data-aos="fade-right">
                        <div class="md:flex items-center">
                            <!-- Lado izquierdo -->
                            <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                                <div class="inline-block p-6 rounded-2xl glass-card max-w-md">
                                    <div class="flex items-center justify-end gap-3 mb-4">
                                        <span class="text-sm font-bold text-gold-500">SÁBADO 16 MAYO</span>
                                        <i class="fas fa-door-open text-gold-500"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2">Registro y Apertura</h3>
                                    <p class="text-gray-400">Recepción de delegaciones y bienvenida oficial</p>
                                </div>
                            </div>

                            <!-- Punto central -->
                            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2">
                                <div class="w-6 h-6 rounded-full bg-gold-500 border-4 border-dark-900 shadow-lg"></div>
                            </div>

                            <!-- Lado derecho (vacío para alternancia) -->
                            <div class="md:w-1/2"></div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="relative" data-aos="fade-left" data-aos-delay="100">
                        <div class="md:flex items-center">
                            <!-- Lado izquierdo (vacío) -->
                            <div class="md:w-1/2"></div>

                            <!-- Punto central -->
                            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2">
                                <div class="w-6 h-6 rounded-full bg-gold-500 border-4 border-dark-900 shadow-lg"></div>
                            </div>

                            <!-- Lado derecho -->
                            <div class="md:w-1/2 md:pl-12">
                                <div class="inline-block p-6 rounded-2xl glass-card max-w-md">
                                    <div class="flex items-center gap-3 mb-4">
                                        <i class="fas fa-sun text-gold-500"></i>
                                        <span class="text-sm font-bold text-gold-500">DOMINGO 17 MAYO - 8:00 AM</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2">MAÑANA DE GLORIA</h3>
                                    <p class="text-gray-400">Devocional general, culto de avivamiento y taller de
                                        formación</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Continuar con el mismo patrón para los demás items... -->

                </div>
            </div>

            <!-- Nota final -->
            <div class="text-center mt-20" data-aos="fade-up">
                <div class="inline-flex items-center gap-4 px-6 py-3 rounded-full glass-card">
                    <i class="fas fa-exclamation-circle text-gold-500"></i>
                    <p class="text-gray-400">* Horarios sujetos a cambios según la dirección del Espíritu Santo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER MODERNIZADO -->
    <footer id="registro" class="relative bg-dark-900 pt-24 pb-12 overflow-hidden">
        <!-- Fondo con gradiente -->
        <div class="absolute inset-0 bg-gradient-to-b from-dark-900 via-dark-800 to-dark-900"></div>

        <!-- Patrón decorativo -->
        <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml,%3Csvg width=" 60" height="60"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" %3E%3Cg fill="none" fill-rule="evenodd" %3E%3Cg
            fill="%23FFD700" fill-opacity="0.4" %3E%3Cpath
            d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"
            /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Grid principal -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">

                <!-- Columna 1: Logo y descripción -->
                <div data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco" class="h-16">
                        <div>
                            <h3 class="text-2xl font-cinzel text-white font-bold">INVESTIDOS</h3>
                            <p class="text-sm text-gray-500">Campamento Juvenil 2026</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Un encuentro divino para jóvenes que buscan ser investidos del poder
                        de lo alto.</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                            <i class="fas fa-church text-gold-500"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Conquistadores Pentecostales</p>
                            <p class="text-sm text-gray-500">Distrito 27</p>
                        </div>
                    </div>
                </div>

                <!-- Columna 2: Contacto -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xl font-bold text-white mb-6 pb-3 border-b border-white/10">Contacto</h3>
                    <div class="space-y-4">
                        <a href="tel:3113300389" class="flex items-center gap-4 group">
                            <div
                                class="w-12 h-12 rounded-xl glass-card flex items-center justify-center group-hover:bg-gold-500/20 transition-colors">
                                <i class="fas fa-phone text-gold-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Teléfonos</p>
                                <p class="text-gray-400 text-sm">311 330 0389 • 313 277 7477</p>
                            </div>
                        </a>
                        <a href="mailto:conquistadoresdt27@gmail.com" class="flex items-center gap-4 group">
                            <div
                                class="w-12 h-12 rounded-xl glass-card flex items-center justify-center group-hover:bg-gold-500/20 transition-colors">
                                <i class="fas fa-envelope text-gold-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Email</p>
                                <p class="text-gray-400 text-sm">conquistadoresdt27@gmail.com</p>
                            </div>
                        </a>
                        <a href="https://wa.me/573113300389" target="_blank" class="flex items-center gap-4 group">
                            <div
                                class="w-12 h-12 rounded-xl glass-card flex items-center justify-center group-hover:bg-green-500/20 transition-colors">
                                <i class="fab fa-whatsapp text-green-500"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">WhatsApp</p>
                                <p class="text-gray-400 text-sm">Consulta rápida</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Columna 3: Redes sociales -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-white mb-6 pb-3 border-b border-white/10">Síguenos</h3>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <a href="https://www.facebook.com/share/17yXzxdwEL/" target="_blank"
                            class="p-4 rounded-xl glass-card hover:bg-blue-500/20 transition-colors group">
                            <i
                                class="fab fa-facebook-f text-2xl text-blue-500 group-hover:scale-110 transition-transform"></i>
                            <p class="text-white text-sm mt-2">Facebook</p>
                        </a>
                        <a href="https://www.instagram.com/conquistadoresd27" target="_blank"
                            class="p-4 rounded-xl glass-card hover:bg-pink-500/20 transition-colors group">
                            <i
                                class="fab fa-instagram text-2xl text-pink-500 group-hover:scale-110 transition-transform"></i>
                            <p class="text-white text-sm mt-2">Instagram</p>
                        </a>
                        <a href="https://youtube.com/@conquistadorespentecostawy8tm" target="_blank"
                            class="p-4 rounded-xl glass-card hover:bg-red-500/20 transition-colors group">
                            <i
                                class="fab fa-youtube text-2xl text-red-500 group-hover:scale-110 transition-transform"></i>
                            <p class="text-white text-sm mt-2">YouTube</p>
                        </a>
                        <a href="https://whatsapp.com/channel/0029Vb29KYMDDmFP0H0gWs2x" target="_blank"
                            class="p-4 rounded-xl glass-card hover:bg-green-500/20 transition-colors group">
                            <i
                                class="fab fa-whatsapp text-2xl text-green-500 group-hover:scale-110 transition-transform"></i>
                            <p class="text-white text-sm mt-2">Canal</p>
                        </a>
                    </div>

                    <!-- Botón de inscripción footer -->
                    <a href="{{ route('registration') }}"
                        class="w-full py-4 rounded-xl bg-gradient-to-r from-gold-600 to-gold-500 text-black font-bold text-center block hover:from-gold-500 hover:to-gold-400 transition-all hover:scale-105">
                        <i class="fas fa-fire mr-2"></i>INSCRIBIRME AHORA
                    </a>
                </div>
            </div>

            <!-- Línea divisoria -->
            <div class="h-px bg-gradient-to-r from-transparent via-gold-500/30 to-transparent mb-8"></div>

            <!-- Copyright -->
            <div class="text-center">
                <p class="text-gray-600 text-sm">
                    &copy; 2026 Conquistadores Pentecostales Distrito 27. Todos los derechos reservados.
                    <br class="md:hidden">
                    <span class="hidden md:inline">•</span>
                    Desarrollado por <a href="https://wa.me/573004200048" target="_blank"
                        class="text-gold-500 hover:text-gold-400 transition-colors">Kaled Molina</a>
                </p>
                <div class="mt-4 flex justify-center gap-2">
                    <div class="w-1 h-1 rounded-full bg-gold-500"></div>
                    <div class="w-1 h-1 rounded-full bg-gold-500"></div>
                    <div class="w-1 h-1 rounded-full bg-gold-500"></div>
                </div>
            </div>
        </div>

        <!-- Wave final -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg class="relative block w-full h-[60px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="fill-gold-900"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="fill-gold-800"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="fill-dark-900"></path>
            </svg>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inicializar AOS
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Navbar Scroll Effect mejorado
        window.addEventListener('scroll', function () {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 100) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Countdown mejorado
        const targetDate = new Date("2026-05-16T08:00:00-05:00").getTime();

        const countdownInterval = setInterval(function () {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = `
                    <div class="text-center">
                        <h3 class="text-3xl font-bold text-gradient-gold mb-2">¡EL EVENTO HA COMENZADO!</h3>
                        <p class="text-gray-400">Dios te bendiga en esta experiencia</p>
                    </div>
                `;
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const timeBoxClass = "relative overflow-hidden rounded-2xl p-4 md:p-6 text-center min-w-[90px] glass-card group hover:bg-white/10 transition-all duration-300";
            const numberClass = "block text-3xl md:text-5xl font-bold text-white mb-1 group-hover:scale-110 transition-transform";
            const labelClass = "text-xs md:text-sm text-gold-400 uppercase tracking-widest font-medium";

            document.getElementById("countdown").innerHTML = `
                <div class="${timeBoxClass}" data-aos="fade-up">
                    <span class="${numberClass}">${days.toString().padStart(2, '0')}</span>
                    <span class="${labelClass}">Días</span>
                </div>
                <div class="${timeBoxClass}" data-aos="fade-up" data-aos-delay="100">
                    <span class="${numberClass}">${hours.toString().padStart(2, '0')}</span>
                    <span class="${labelClass}">Horas</span>
                </div>
                <div class="${timeBoxClass}" data-aos="fade-up" data-aos-delay="200">
                    <span class="${numberClass}">${minutes.toString().padStart(2, '0')}</span>
                    <span class="${labelClass}">Minutos</span>
                </div>
                <div class="${timeBoxClass}" data-aos="fade-up" data-aos-delay="300">
                    <span class="${numberClass}">${seconds.toString().padStart(2, '0')}</span>
                    <span class="${labelClass}">Segundos</span>
                </div>
            `;
        }, 1000);

        // Mobile Menu Logic mejorado
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu-btn');

        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // Cerrar menú al hacer clic en enlaces
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });

        // Efecto de escritura para textos importantes (opcional)
        document.addEventListener('DOMContentLoaded', function () {
            // Agregar efecto de entrada a elementos
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                    }
                });
            }, observerOptions);

            // Observar elementos que no tienen AOS
            document.querySelectorAll('[data-aos]:not(.aos-animate)').forEach(el => {
                observer.observe(el);
            });
        });

        // Parallax effect suave
        window.addEventListener('scroll', function () {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax');

            parallaxElements.forEach(element => {
                const speed = element.dataset.speed || 0.5;
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</body>

</html>