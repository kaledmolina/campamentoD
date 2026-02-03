<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'INVESTI2 - Campamento Juvenil 2026' }}</title>

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
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        /* Form Inputs Override */
        input,
        select {
            background-color: rgba(66, 45, 30, 0.7) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            color: #eaddcf !important;
        }

        input:focus,
        select:focus {
            border-color: #D4AF37 !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2) !important;
            outline: none;
        }

        option {
            background-color: #2b1d12;
            color: #eaddcf;
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
                <a href="/#inicio"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Inicio
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/#invitados"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Invitados
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/#Agenda"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Agenda
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/#inversion"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group">
                    Inversión
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('consultation') }}"
                    class="text-sm font-bold uppercase tracking-widest text-prestige-100/80 hover:text-gold-400 transition-colors duration-300 relative group {{ request()->routeIs('consultation') ? 'text-gold-400' : '' }}">
                    Pagos
                    <span
                        class="absolute -bottom-2 left-0 w-0 h-[2px] bg-gold-500 transition-all duration-300 group-hover:w-full {{ request()->routeIs('consultation') ? 'w-full' : '' }}"></span>
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

        <a href="/#inicio" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Inicio</a>
        <a href="/#invitados" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Invitados</a>
        <a href="/#Agenda" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Agenda</a>
        <a href="/#inversion" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Inversión</a>
        <a href="{{ route('consultation') }}" onclick="toggleMenu()"
            class="mobile-link text-4xl font-cinzel text-prestige-100 hover:text-gold-400 transition-colors">Consulta</a>

        <a href="{{ route('registration') }}" onclick="toggleMenu()"
            class="mt-10 bg-gold-500 text-black font-bold py-5 px-14 rounded shadow-lg text-lg tracking-widest uppercase hover:bg-white hover:text-gold-600 transition-all">
            Inscribirme
        </a>
    </div>

    <main class="container mx-auto py-12 px-4 flex-grow pt-40 relative z-10">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="bg-prestige-950 pt-24 pb-12 border-t border-white/10 relative overflow-hidden mt-auto">

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
                        <a href="https://www.youtube.com/@conquistadorespentecosta-wy8tm" target="_blank"
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

    <script>
        // Mobile Menu Logic
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            mobileMenu.classList.toggle('translate-x-full');
            document.body.classList.toggle('overflow-hidden'); // Prevent scrolling when menu is open
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', toggleMenu);
        }

        if (closeMenuBtn) {
            closeMenuBtn.addEventListener('click', toggleMenu);
        }

        // Close menu when clicking a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', toggleMenu);
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
    </script>
</body>

</html>