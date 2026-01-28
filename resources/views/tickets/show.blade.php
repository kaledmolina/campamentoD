<x-layouts.app>
    <div class="min-h-screen py-8 md:py-12 px-4 flex items-center justify-center bg-zinc-950 relative overflow-hidden">

        <!-- Background Ambient Glow -->
        <div
            class="absolute top-1/4 left-1/4 w-64 h-64 bg-gold-500/10 rounded-full blur-[100px] pointer-events-none animate-pulse">
        </div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-yellow-600/10 rounded-full blur-[100px] pointer-events-none animate-pulse"
            style="animation-delay: 1s;"></div>

        <!-- Ticket Container -->
        <div class="max-w-[22rem] md:max-w-md w-full relative group perspective-1000 mx-auto">

            <!-- Glow Effect Wrapper -->
            <div
                class="absolute -inset-1 bg-gradient-to-r from-gold-600/40 via-yellow-400/40 to-gold-600/40 rounded-3xl blur-md opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 pointer-events-none">
            </div>

            <!-- Main Ticket Card -->
            <div id="ticket-card"
                class="relative bg-zinc-900 rounded-3xl border border-gold-500/30 overflow-hidden shadow-[0_0_40px_rgba(0,0,0,0.5)]">

                <!-- Decorative Header Background -->
                <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-gold-900/30 to-transparent"></div>

                <!-- Noise Texture Overlay (Optional for grit) -->
                <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
                    style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48ZmlsdGVyIGlkPSJub2lzZSI+PHBmZVR1cmJ1bGVuY2UgdHlwZT0iZnJhY3RhbE5vaXNlIiBiYXNlRnJlcXVlbmN5PSIwLjY1IiBudW1PY3RhdmVzPSIzIiBzdGl0Y2hUaWxlcz0ic3RpdGNoIi8+PC9maWx0ZXI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsdGVyPSJ1cmwoI25vaXNlKSIgb3BhY2l0eT0iMSIvPjwvc3ZnPg==');">
                </div>

                <!-- Ticket Holes/Notches -->
                <div class="absolute top-1/2 -mt-3 -left-3 w-6 h-6 bg-zinc-950 rounded-full z-10 shadow-inner"></div>
                <div class="absolute top-1/2 -mt-3 -right-3 w-6 h-6 bg-zinc-950 rounded-full z-10 shadow-inner"></div>
                <div
                    class="absolute top-1/2 left-5 right-5 border-t-2 border-dashed border-zinc-800/80 pointer-events-none">
                </div>

                <!-- Content -->
                <div class="relative p-6 px-6 text-center z-10">

                    <!-- Event Branding -->
                    <div class="mb-6 relative">
                        <div
                            class="inline-block px-3 py-1 rounded-full border border-gold-500/30 bg-gold-900/10 backdrop-blur-sm mb-3">
                            <h3 class="text-gold-400 tracking-[0.2em] text-[10px] sm:text-xs font-bold uppercase">Ticket
                                de Acceso</h3>
                        </div>
                        <h1
                            class="text-4xl sm:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-b from-white via-gold-100 to-gold-400 cinzel mb-2 tracking-wide drop-shadow-lg">
                            INVESTI2
                        </h1>
                        <p class="text-zinc-400 text-[10px] sm:text-xs tracking-[0.3em] uppercase">Campamento Distrital
                            2026</p>
                    </div>

                    <!-- User Info -->
                    <div class="mb-6">
                        <div class="relative inline-block">
                            <!-- Profile Avatar Placeholder or Initials could go here if available -->
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1 uppercase tracking-tight">
                            {{ $user->name }}</h2>
                        <h2
                            class="text-xl sm:text-2xl font-bold text-gold-400 mb-3 uppercase tracking-tight leading-none">
                            {{ $user->last_name }}</h2>

                        <div
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-800/50 border border-zinc-700/50 text-[11px] text-zinc-300 tracking-wider font-mono">
                            <span class="opacity-50">ID:</span> {{ $user->document_type }} {{ $user->document_number }}
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div
                        class="grid grid-cols-2 gap-4 mb-6 text-left border-t border-b border-zinc-800 py-6 bg-zinc-900/50 mx-[-1.5rem] px-8 relative">
                        <div class="relative">
                            <span
                                class="block text-[10px] text-gold-600 uppercase tracking-widest font-bold mb-1">Zona</span>
                            <span class="block text-white font-bold text-sm tracking-wide">{{ $user->zone }}</span>
                        </div>
                        <div class="text-right">
                            <span
                                class="block text-[10px] text-gold-600 uppercase tracking-widest font-bold mb-1">Congregación</span>
                            <span
                                class="block text-white font-bold text-sm tracking-wide">{{ $user->congregacion }}</span>
                        </div>
                        <div class="mt-3 text-left">
                            <span
                                class="block text-[10px] text-gold-600 uppercase tracking-widest font-bold mb-1">Fecha</span>
                            <span
                                class="block text-white font-bold text-sm capitalize tracking-wide">{{ now()->locale('es')->isoFormat('D MMMM') }}</span>
                        </div>
                        <div class="text-right mt-3">
                            <span
                                class="block text-[10px] text-gold-600 uppercase tracking-widest font-bold mb-1">Estado</span>
                            <span
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-emerald-950/50 text-emerald-400 text-[10px] font-bold border border-emerald-900/50">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                PAGADO
                            </span>
                        </div>
                    </div>

                    <!-- QR CodeSection -->
                    <div class="flex flex-col items-center justify-center mb-4">
                        <div
                            class="p-3 bg-white rounded-xl shadow-[0_0_25px_rgba(255,255,255,0.15)] relative group-hover:shadow-[0_0_35px_rgba(255,255,255,0.25)] transition duration-500">
                            <!-- Corner accents -->
                            <div
                                class="absolute -top-1 -left-1 w-3 h-3 border-t-2 border-l-2 border-gold-500 rounded-tl-sm">
                            </div>
                            <div
                                class="absolute -top-1 -right-1 w-3 h-3 border-t-2 border-r-2 border-gold-500 rounded-tr-sm">
                            </div>
                            <div
                                class="absolute -bottom-1 -left-1 w-3 h-3 border-b-2 border-l-2 border-gold-500 rounded-bl-sm">
                            </div>
                            <div
                                class="absolute -bottom-1 -right-1 w-3 h-3 border-b-2 border-r-2 border-gold-500 rounded-br-sm">
                            </div>

                            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"
                                class="w-36 h-36 sm:w-40 sm:h-40">
                        </div>
                        <p class="text-[10px] text-zinc-500 uppercase tracking-[0.2em] mt-4 font-medium">Presenta este
                            código en la entrada</p>
                    </div>

                    <!-- ID Hashtag -->
                    <div class="mt-4 font-mono text-zinc-700 text-xs tracking-widest">
                        #{{ str_pad($user->id, 8, '0', STR_PAD_LEFT) }}
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center items-center relative z-50">
                <button onclick="captureTicket()" id="btn-capture"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-gold-500 to-yellow-500 hover:from-gold-400 hover:to-yellow-400 text-black rounded-xl transition-all shadow-[0_4px_20px_rgba(212,175,55,0.3)] hover:shadow-[0_6px_25px_rgba(212,175,55,0.4)] hover:-translate-y-0.5 active:translate-y-0">
                    <i class="fas fa-download"></i> <span
                        class="text-sm font-bold uppercase tracking-wide">Descargar</span>
                </button>

                <button onclick="shareTicket()"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3.5 bg-zinc-800/80 hover:bg-zinc-700 backdrop-blur-md text-white rounded-xl transition-all border border-zinc-700 hover:border-zinc-600 hover:-translate-y-0.5">
                    <i class="fas fa-share-nodes"></i> <span
                        class="text-sm font-bold uppercase tracking-wide">Compartir</span>
                </button>

                <a href="{{ route('consultation') }}"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3.5 bg-transparent hover:bg-white/5 text-zinc-500 hover:text-white rounded-xl transition-all">
                    <span class="text-xs font-bold uppercase tracking-wider">Volver</span>
                </a>
            </div>

        </div>
    </div>

    <!-- Additional Styles for Cinzel Font if not globally loaded -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&display=swap');

        .cinzel {
            font-family: 'Cinzel', serif;
        }

        .perspective-1000 {
            perspective: 1000px;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function captureTicket() {
            const ticketElement = document.getElementById('ticket-card');
            const btn = document.getElementById('btn-capture');
            const originalContent = btn.innerHTML;

            // Show loading state
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span class="text-sm font-bold uppercase tracking-wide">Procesando...</span>';
            btn.classList.add('opacity-75', 'cursor-not-allowed');

            // Small delay to allow DOM to render any pending changes
            setTimeout(() => {
                html2canvas(ticketElement, {
                    backgroundColor: null,
                    scale: 3, // High quality
                    useCORS: true,
                    allowTaint: true,
                    logging: false,
                    onclone: (clonedDoc) => {
                        // Optional: Adjust styles in update for the screenshot specifically if needed
                        // e.g., clonedDoc.getElementById('ticket-card').style.borderRadius = '0';
                    }
                }).then(canvas => {
                    const link = document.createElement('a');
                    link.download = 'Ticket-Investi2-{{ $user->document_number }}.png';
                    link.href = canvas.toDataURL('image/png', 1.0);
                    link.click();
                }).catch(err => {
                    console.error('Error html2canvas:', err);
                    alert('No se pudo generar la imagen automáticamente. Por favor toma una captura de pantalla.');
                }).finally(() => {
                    // Restore button
                    btn.innerHTML = originalContent;
                    btn.disabled = false;
                    btn.classList.remove('opacity-75', 'cursor-not-allowed');
                });
            }, 100);
        }

        async function shareTicket() {
            const shareData = {
                title: 'Mi Ticket - Investi2 2026',
                text: '¡Ya tengo mi entrada oficial para el Campamento Distrital Investi2! 🏕️✨',
                url: window.location.href
            };

            try {
                if (navigator.share) {
                    await navigator.share(shareData);
                } else {
                    await navigator.clipboard.writeText(window.location.href);
                    // Custom toast notification could go here
                    alert('¡Enlace copiado! Compártelo con tus amigos.');
                }
            } catch (err) {
                console.error('Error al compartir:', err);
            }
        }
    </script>
</x-layouts.app>