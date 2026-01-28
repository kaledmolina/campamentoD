<x-layouts.app>
    <div class="min-h-screen py-12 px-4 flex items-center justify-center">

        <!-- Ticket Container -->
        <div class="max-w-md w-full relative group perspective-1000">

            <!-- Glow Effect -->
            <div
                class="absolute -inset-1 bg-gradient-to-r from-gold-600 to-yellow-300 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200 pointer-events-none">
            </div>

            <!-- Main Ticket Card -->
            <div id="ticket-card"
                class="relative bg-black rounded-2xl border border-gold-500/30 overflow-hidden shadow-2xl">

                <!-- Decorative Header Background -->
                <div class="absolute top-0 left-0 w-full h-20 bg-gradient-to-b from-gold-900/20 to-transparent"></div>

                <!-- Ticket Holes/Notches -->
                <div class="absolute top-1/2 -left-3 w-6 h-6 bg-[#050505] rounded-full z-10"></div>
                <div class="absolute top-1/2 -right-3 w-6 h-6 bg-[#050505] rounded-full z-10"></div>
                <div
                    class="absolute top-1/2 left-4 right-4 border-t-2 border-dashed border-gray-800 pointer-events-none">
                </div>

                <!-- Content -->
                <div class="relative p-5 px-6 text-center">

                    <!-- Event Branding -->
                    <h3 class="text-gold-500 tracking-[0.2em] text-[10px] font-bold uppercase mb-1">TICKET DE ACCESO
                    </h3>
                    <h1 class="text-3xl md:text-4xl font-black text-white cinzel mb-1 tracking-wide"
                        style="text-shadow: 0 2px 10px rgba(212,175,55,0.3)">
                        INVESTI2
                    </h1>
                    <p class="text-gray-400 text-[10px] tracking-widest uppercase mb-4">Campamento Distrital 2026</p>

                    <!-- User Info -->
                    <div class="mb-4">
                        <h2 class="text-xl font-bold text-white mb-0 uppercase">{{ $user->name }}</h2>
                        <h2 class="text-lg font-bold text-gold-400 mb-2 uppercase">{{ $user->last_name }}</h2>

                        <div
                            class="inline-block px-3 py-0.5 rounded-full bg-white/5 border border-white/10 text-[10px] text-gray-300 tracking-wider">
                            {{ $user->document_type }} {{ $user->document_number }}
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div
                        class="grid grid-cols-2 gap-3 mb-4 text-left border-t border-b border-gray-800 py-4 bg-white/5 mx-[-1.5rem] px-6">
                        <div>
                            <span class="block text-[10px] text-gold-500 uppercase tracking-widest mb-1">Zona</span>
                            <span class="block text-white font-bold">{{ $user->zone }}</span>
                        </div>
                        <div class="text-right">
                            <span
                                class="block text-[10px] text-gold-500 uppercase tracking-widest mb-1">Congregación</span>
                            <span class="block text-white font-bold">{{ $user->congregacion }}</span>
                        </div>
                        <div class="mt-2 text-left">
                            <span class="block text-[10px] text-gold-500 uppercase tracking-widest mb-1">Fecha</span>
                            <span
                                class="block text-white font-bold capitalize">{{ now()->locale('es')->isoFormat('D MMM') }}</span>
                        </div>
                        <div class="text-right mt-2">
                            <span class="block text-[10px] text-gold-500 uppercase tracking-widest mb-1">Estado</span>
                            <span
                                class="inline-block px-2 py-0.5 rounded bg-green-900/40 text-green-400 text-xs font-bold border border-green-800">PAGADO</span>
                        </div>
                    </div>

                    <!-- QR Code -->
                    <div class="flex justify-center mb-4">
                        <div class="p-3 bg-white rounded-xl shadow-[0_0_20px_rgba(255,255,255,0.1)]">
                            <img src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code" class="w-40 h-40">
                        </div>
                    </div>

                    <p class="text-xs text-gray-500 uppercase tracking-wide">Presenta este código en la entrada</p>

                    <!-- ID Hashtag -->
                    <div class="mt-6 font-mono text-gray-700 text-sm">
                        #{{ str_pad($user->id, 8, '0', STR_PAD_LEFT) }}
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex gap-4 justify-center flex-wrap relative z-50">
                <button onclick="captureTicket()"
                    class="flex items-center gap-2 px-6 py-3 bg-gold-500 hover:bg-gold-400 text-black rounded-full transition shadow-[0_0_15px_rgba(212,175,55,0.3)]">
                    <i class="fas fa-camera"></i> <span class="text-sm font-bold">Guardar Imagen</span>
                </button>

                <button onclick="shareTicket()"
                    class="flex items-center gap-2 px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white rounded-full transition border border-gray-700">
                    <i class="fas fa-share-alt"></i> <span class="text-sm font-bold">Compartir</span>
                </button>

                <a href="{{ route('consultation') }}"
                    class="flex items-center gap-2 px-6 py-3 bg-transparent hover:bg-white/10 text-gray-400 hover:text-white rounded-full transition border border-gray-700">
                    <i class="fas fa-arrow-left"></i> <span class="text-sm font-bold">Volver</span>
                </a>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function captureTicket() {
            const ticketElement = document.getElementById('ticket-card');

            // Show loading state
            const btn = document.querySelector('button[onclick="captureTicket()"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Guardando...';

            console.log('Capturing ticket...', ticketElement);

            html2canvas(ticketElement, {
                backgroundColor: null,
                scale: 2, // Better quality
                useCORS: true,
                allowTaint: true,
                logging: true
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'Ticket-Investi2-{{ $user->document_number }}.png';
                link.href = canvas.toDataURL('image/png');
                link.click();

                // Restore button
                btn.innerHTML = originalText;
            }).catch(err => {
                console.error('Error html2canvas:', err);
                alert('Error al generar la imagen. Intenta con captura de pantalla.');
                btn.innerHTML = originalText;
            });
        }

        async function shareTicket() {
            const shareData = {
                title: 'Mi Ticket - Investi2 2026',
                text: '¡Ya tengo mi entrada para el Campamento Distrital Investi2! Nos vemos allá.',
                url: window.location.href
            };

            try {
                if (navigator.share) {
                    await navigator.share(shareData);
                } else {
                    // Fallback for desktop
                    navigator.clipboard.writeText(window.location.href);
                    alert('Enlace copiado al portapapeles!');
                }
            } catch (err) {
                console.error('Error al compartir:', err);
            }
        }
    </script>
</x-layouts.app>