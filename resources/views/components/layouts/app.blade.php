<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'INVESTI2 - Campamento Juvenil 2026' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&family=Cinzel:wght@400;700&display=swap"
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
            background: linear-gradient(to bottom, #422006, #1a0b03);
            /* Global Gold/Brown Theme */
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
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
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
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

        /* Form Inputs Override */
        input,
        select {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            color: white !important;
        }

        input:focus,
        select:focus {
            border-color: #D4AF37 !important;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2) !important;
        }

        option {
            background-color: #050505;
            color: white;
        }

        .nav-scrolled {
            background-color: rgba(66, 32, 6, 0.95);
            /* Dark Brown/Gold Theme */
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">

    <div class="fire-bg"></div>

    <!-- NAVIGATION -->
    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-6">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex items-center gap-2 group">
                <img src="{{ asset('images/INVESTIDOS.png') }}" alt="Logo"
                    class="h-12 md:h-16 transition-transform duration-300 group-hover:scale-110">
            </a>

            <div
                class="hidden md:flex space-x-8 items-center bg-black/30 backdrop-blur-md px-8 py-3 rounded-full border border-white/10">
                <a href="/#inicio"
                    class="text-gray-300 hover:text-gold-400 text-sm md:text-base uppercase tracking-widest transition duration-300">Inicio</a>
                <a href="/#invitados"
                    class="text-gray-300 hover:text-gold-400 text-sm md:text-base uppercase tracking-widest transition duration-300">Invitados</a>
                <a href="/#cronograma"
                    class="text-gray-300 hover:text-gold-400 text-sm md:text-base uppercase tracking-widest transition duration-300">Agenda</a>
                <a href="/#inversion"
                    class="text-gray-300 hover:text-gold-400 text-sm md:text-base uppercase tracking-widest transition duration-300">Inversión</a>
                <a href="{{ route('consultation') }}"
                    class="text-gray-300 hover:text-gold-400 text-sm md:text-base uppercase tracking-widest transition duration-300 {{ request()->routeIs('consultation') ? 'text-gold-400' : '' }}">Consulta
                    / Pagos</a>
            </div>

            <a href="{{ route('registration') }}"
                class="hidden md:block bg-gold-500 hover:bg-gold-400 text-black font-bold py-2 px-6 rounded-full transition transform hover:scale-105 shadow-[0_0_15px_rgba(212,175,55,0.5)]">
                INSCRIBIRME
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-2xl text-white focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] bg-black/95 transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center space-y-8">
        <button id="close-menu-btn" class="absolute top-6 right-6 text-3xl text-gray-400 hover:text-white">
            <i class="fas fa-times"></i>
        </button>

        <a href="/#inicio"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Inicio</a>
        <a href="/#invitados"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Invitados</a>
        <a href="/#cronograma"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Agenda</a>
        <a href="/#inversion"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Inversión</a>
        <a href="{{ route('consultation') }}"
            class="mobile-link text-2xl font-bold text-white hover:text-gold-500 tracking-widest uppercase transition">Consulta
            / Pagos</a>

        <a href="{{ route('registration') }}"
            class="mt-4 bg-gold-500 text-black font-bold py-3 px-8 rounded-full shadow-[0_0_20px_rgba(212,175,55,0.4)]">
            INSCRIBIRME
        </a>
    </div>

    <main class="container mx-auto py-12 px-4 flex-grow pt-32">
        {{ $slot }}
    </main>

    <footer class="bg-gradient-to-t from-[#3E2723] to-[#1a0b03] pt-20 pb-10 border-t border-gray-900 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center text-center md:text-left">

                <div>
                    <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo Blanco"
                        class="h-20 mx-auto md:mx-0 mb-4 opacity-80">
                    <p class="text-gray-500 text-sm">Conquistadores Pentecostales – Distrito 27<br>Iglesia Pentecostal
                        Unida de Colombia</p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white mb-4">MAYOR INFORMACIÓN</h3>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-phone text-gold-500"></i> 311 330 03 89 – 313 277 74 77 – 312 213 85 97
                    </p>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-envelope text-gold-500"></i> conquistadoresdt27@gmail.com
                    </p>
                </div>

                <div>
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
                nav.classList.add('bg-[#422006]/95'); // Fallback/Base color if needed, but class handles it
            } else {
                nav.classList.remove('nav-scrolled');
                nav.classList.remove('bg-[#422006]/95');
            }
        });
    </script>
</body>

</html>