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
            background-color: #050505;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
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
    </style>
</head>

<body class="flex flex-col min-h-screen">

    <div class="fire-bg"></div>

    <!-- NAVIGATION -->
    <nav
        class="w-full z-50 py-6 px-4 md:px-8 flex justify-between items-center bg-black/80 border-b border-gold-500/20 backdrop-blur-md">
        <div class="w-24 md:w-32">
            <a href="/">
                <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo"
                    class="w-full drop-shadow-lg has-tooltip" title="Volver al Inicio">
            </a>
        </div>

        <div class="hidden md:flex gap-8 text-sm font-bold tracking-widest uppercase">
            <a href="/#inicio" class="hover:text-gold-500 transition duration-300">Inicio</a>
            <a href="/#invitados" class="hover:text-gold-500 transition duration-300">Invitados</a>
            <a href="/#cronograma" class="hover:text-gold-500 transition duration-300">Programa</a>
            <a href="/#inversion" class="hover:text-gold-500 transition duration-300">Inversión</a>
            <a href="{{ route('consultation') }}"
                class="hover:text-gold-500 transition duration-300 {{ request()->routeIs('consultation') ? 'text-gold-500' : '' }}">Consulta
                / Pagos</a>
        </div>

        <a href="{{ route('registration') }}"
            class="hidden md:block bg-gold-500 hover:bg-gold-400 text-black font-bold py-2 px-6 rounded-full transition transform hover:scale-105 shadow-[0_0_15px_rgba(212,175,55,0.5)]">
            REGISTRARME
        </a>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-2xl text-white">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <main class="container mx-auto py-12 px-4 flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-black pt-10 pb-10 border-t border-gray-900 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <img src="{{ asset('images/Investido Blanco.png') }}" alt="Logo Blanco"
                class="h-16 mx-auto mb-4 opacity-80">
            <p class="text-gray-500 text-sm mb-4">Distrito 27 - Sincelejo, Sucre.</p>
            <p class="text-gray-600 text-xs">
                &copy; 2026 Misión Juvenil. Todos los derechos reservados.
            </p>
        </div>
    </footer>
</body>

</html>