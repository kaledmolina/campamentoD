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
    <nav id="navbar"
        class="fixed w-full z-50 transition-all duration-300 py-6 px-4 md:px-8 flex justify-between items-center">
        <div class="w-24 md:w-32">
            <!-- Logo Pequeño Nav -->
            <img src="{{ asset('images/InvestidoBlanco.png') }}" alt="Logo" class="w-full drop-shadow-lg">
        </div>

        <div class="hidden md:flex gap-8 text-sm font-bold tracking-widest uppercase">
            <a href="#inicio" class="hover:text-gold-500 transition duration-300">Inicio</a>
            <a href="#invitados" class="hover:text-gold-500 transition duration-300">Invitados</a>
            <a href="#cronograma" class="hover:text-gold-500 transition duration-300">Programa</a>
            <a href="#inversion" class="hover:text-gold-500 transition duration-300">Inversión</a>
            <a href="{{ route('consultation') }}" class="hover:text-gold-500 transition duration-300">Consulta /
                Pagos</a>
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

    <!-- HERO SECTION -->
    <header id="inicio" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/investidobanner.png') }}"
                class="w-full h-full object-cover opacity-40 scale-105 animate-pulse-slow" alt="Fondo">
            <div class="absolute inset-0 bg-gradient-to-t from-[#050505] via-[#050505]/60 to-black/80"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-12">

            <p data-aos="fade-up" data-aos-delay="300"
                class="text-gold-500 font-cinzel text-xl md:text-2xl tracking-[0.2em] mb-2">
                CAMPAMENTO JUVENIL 2026
            </p>

            <h1 data-aos="fade-up" data-aos-delay="500"
                class="text-4xl md:text-7xl font-black text-white uppercase mb-6 leading-tight">
                Por un mismo <br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-yellow-400">Espíritu</span>
            </h1>

            <!-- Countdown Timer -->
            <div data-aos="fade-up" data-aos-delay="700" class="flex flex-wrap justify-center gap-4 md:gap-8 my-10"
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
                No es solo un evento, es una <strong>convocatoria divina</strong>. INVESTIDOS 2026 es el tiempo donde la
                juventud del Distrito 27 se reúne para recibir el manto de poder que transforma generaciones. Prepárate
                para 3 días de inmersión espiritual, adoración profética y palabra revelada.
            </p>
            <div class="h-1 w-24 bg-gradient-to-r from-transparent via-gold-500 to-transparent mx-auto"
                data-aos="scale-x"></div>
        </div>
    </section>

    <!-- INVITADOS (GRID MEJORADO) -->
    <section id="invitados" class="py-20 bg-[#0a0a0a]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl md:text-6xl font-black text-center mb-16 uppercase text-gray-800 relative"
                data-aos="fade-in">
                Expositores
                <span
                    class="absolute inset-0 text-transparent bg-clip-text bg-gradient-to-b from-white/10 to-transparent blur-sm">Expositores</span>
                <p class="text-lg md:text-xl text-gold-500 font-cinzel font-normal mt-[-10px] relative z-10 capitalize">
                    Voceros de Dios</p>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card Component Function -->
                <div class="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg shadow-black"
                    data-aos="flip-left">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center">
                        <!-- Aquí podrías poner fotos reales si las tuvieras recortadas, uso íconos por ahora -->
                        <i
                            class="fas fa-user-tie text-6xl text-gray-700 group-hover:text-gold-500 transition duration-500 transform group-hover:scale-110"></i>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent opacity-90">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-6 w-full transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <p class="text-orange-500 font-bold uppercase text-xs mb-1 tracking-widest">Conferencista</p>
                        <h3 class="text-2xl font-bold text-white mb-1">Pr. Jhon Fabio García</h3>
                        <div class="h-0.5 w-0 bg-gold-500 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

                <div class="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg shadow-black"
                    data-aos="flip-left" data-aos-delay="100">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center">
                        <i
                            class="fas fa-user-tie text-6xl text-gray-700 group-hover:text-gold-500 transition duration-500 transform group-hover:scale-110"></i>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent opacity-90">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-6 w-full transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <p class="text-orange-500 font-bold uppercase text-xs mb-1 tracking-widest">Conferencista</p>
                        <h3 class="text-2xl font-bold text-white mb-1">Pr. Michael Álvarez</h3>
                        <div class="h-0.5 w-0 bg-gold-500 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

                <div class="group relative h-80 rounded-2xl overflow-hidden cursor-pointer shadow-lg shadow-black"
                    data-aos="flip-left" data-aos-delay="200">
                    <div class="absolute inset-0 bg-gray-900 flex items-center justify-center">
                        <i
                            class="fas fa-music text-6xl text-gray-700 group-hover:text-orange-500 transition duration-500 transform group-hover:scale-110"></i>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent opacity-90">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 p-6 w-full transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <p class="text-orange-500 font-bold uppercase text-xs mb-1 tracking-widest">Adoración</p>
                        <h3 class="text-2xl font-bold text-white mb-1">Juan Pablo Murillo</h3>
                        <div class="h-0.5 w-0 bg-gold-500 group-hover:w-full transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Nota: Agrega más bloques aquí para el resto de pastores -->
            </div>

            <p class="text-center text-gray-500 mt-8 italic" data-aos="fade-in">Y muchos más siervos de Dios...</p>
        </div>
    </section>

    <!-- BANNER PARALLAX -->
    <div class="relative py-32 bg-fixed bg-center bg-cover"
        style="background-image: url('{{ asset('images/investidobanner.png') }}');">
        <div class="absolute inset-0 bg-black/70"></div>
        <div class="relative container mx-auto text-center px-4">
            <h2 class="text-3xl md:text-5xl font-black uppercase text-white mb-6 drop-shadow-lg" data-aos="zoom-in">
                "Y recibiréis poder"
            </h2>
            <p class="text-gold-500 text-xl font-cinzel" data-aos="fade-up">Hechos 1:8</p>
        </div>
    </div>

    <!-- CRONOGRAMA (TIMELINE) -->
    <section id="cronograma" class="py-20 bg-[#050505] relative overflow-hidden">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-white" data-aos="fade-up">Cronograma</h2>
                <p class="text-gray-400 mt-2" data-aos="fade-up">Agenda sujeta a la dirección del Espíritu Santo</p>
            </div>

            <!-- Linea Vertical -->
            <div
                class="relative border-l-2 border-gold-500/30 ml-4 md:ml-1/2 md:transform md:-translate-x-1/2 space-y-12">

                <!-- Item 1 -->
                <div class="relative flex items-center md:justify-between md:flex-row-reverse group">
                    <div
                        class="absolute -left-[9px] md:left-1/2 md:-ml-[9px] w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10">
                    </div>

                    <div class="ml-8 md:ml-0 md:w-[45%] p-6 glass-card rounded-xl hover:bg-white/5 transition"
                        data-aos="fade-left">
                        <span class="text-orange-500 font-bold text-sm">Sábado 16 Mayo - 2:00 PM</span>
                        <h3 class="text-xl font-bold text-white mt-1">Apertura y Registro</h3>
                        <p class="text-sm text-gray-400 mt-2">Recepción de delegaciones, asignación de cabañas y primer
                            servicio de avivamiento.</p>
                    </div>
                    <div class="hidden md:block md:w-[45%]"></div>
                </div>

                <!-- Item 2 -->
                <div class="relative flex items-center md:justify-between group">
                    <div
                        class="absolute -left-[9px] md:left-1/2 md:-ml-[9px] w-5 h-5 rounded-full bg-gold-500 border-4 border-black z-10">
                    </div>

                    <div class="ml-8 md:ml-0 md:w-[45%] p-6 glass-card rounded-xl hover:bg-white/5 transition"
                        data-aos="fade-right">
                        <span class="text-orange-500 font-bold text-sm">Domingo 17 Mayo - 8:00 AM</span>
                        <h3 class="text-xl font-bold text-white mt-1">Mañana de Gloria</h3>
                        <p class="text-sm text-gray-400 mt-2">Devocional general, talleres por edades y plenaria
                            profética.</p>
                    </div>
                    <div class="hidden md:block md:w-[45%]"></div>
                </div>

                <!-- Item 3 -->
                <div class="relative flex items-center md:justify-between md:flex-row-reverse group">
                    <div
                        class="absolute -left-[9px] md:left-1/2 md:-ml-[9px] w-5 h-5 rounded-full bg-orange-600 border-4 border-black z-10 animate-ping">
                    </div>
                    <div
                        class="absolute -left-[9px] md:left-1/2 md:-ml-[9px] w-5 h-5 rounded-full bg-orange-600 border-4 border-black z-10">
                    </div>

                    <div class="ml-8 md:ml-0 md:w-[45%] p-6 glass-card rounded-xl hover:bg-white/5 transition border-orange-500/30"
                        data-aos="fade-left">
                        <span class="text-orange-500 font-bold text-sm">Lunes 18 Mayo - 10:00 AM</span>
                        <h3 class="text-xl font-bold text-white mt-1">Gran Cierre: La Investidura</h3>
                        <p class="text-sm text-gray-400 mt-2">Servicio final de impartición, toma de votos y despedida.
                        </p>
                    </div>
                    <div class="hidden md:block md:w-[45%]"></div>
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
                    <h3 class="text-xl font-bold text-gray-300 uppercase tracking-widest mb-4">Estadía Parcial</h3>
                    <div class="text-4xl font-black text-white mb-2">$150.000</div>
                    <p class="text-sm text-gray-500 mb-6">Por persona</p>

                    <ul class="text-left space-y-3 mb-8 text-gray-300 text-sm">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Entrada a
                            conferencias</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500"></i> Material de
                            apoyo</li>
                        <li class="flex items-center gap-2"><i class="fas fa-times text-red-500"></i> Alimentación</li>
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
                    <div class="text-5xl font-black text-white mb-2">$300.000</div>
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
                    <img src="Investido Blanco.png" alt="Logo Blanco" class="h-20 mx-auto md:mx-0 mb-4 opacity-80">
                    <p class="text-gray-500 text-sm">Distrito 27 - Sincelejo, Sucre.<br>Iglesia Pentecostal Unida de
                        Colombia.</p>
                </div>

                <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xl font-bold text-white mb-4">Contacto Directo</h3>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-phone text-gold-500"></i> 311 330 03 89
                    </p>
                    <p class="flex items-center justify-center md:justify-start gap-3 text-gray-300">
                        <i class="fas fa-envelope text-gold-500"></i> contacto@misionjuvenil.com
                    </p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-xl font-bold text-white mb-4">Síguenos</h3>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-pink-600 transition"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-red-600 transition"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-900 mt-12 pt-8 text-center text-gray-600 text-xs">
                &copy; 2026 Misión Juvenil. Todos los derechos reservados.
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

        // Countdown Logic
        // Countdown Logic - Target Date: May 16, 2026
        const targetDate = new Date("2026-05-16T00:00:00").getTime();

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

            const timeBoxClass = "bg-white/10 backdrop-blur-md border border-gold-500/30 rounded-lg p-3 md:p-4 text-center min-w-[80px] md:min-w-[100px]";
            const numberClass = "block text-2xl md:text-4xl font-bold text-white";
            const labelClass = "text-xs text-gold-500 uppercase tracking-widest";

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
    </script>
</body>

</html>