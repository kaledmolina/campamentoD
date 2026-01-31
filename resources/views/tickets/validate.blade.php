<x-layouts.app>
    <div
        class="min-h-screen flex items-center justify-center p-4 py-12 bg-gradient-to-b from-[#422006] to-[#1a0b03] relative">

        <!-- Background Ambient -->
        <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
            <!-- Noise Texture -->
            <div class="absolute inset-0 opacity-[0.03] z-0"
                style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48ZmlsdGVyIGlkPSJub2lzZSI+PHBmZVR1cmJ1bGVuY2UgdHlwZT0iZnJhY3RhbE5vaXNlIiBiYXNlRnJlcXVlbmN5PSIwLjY1IiBudW1PY3RhdmVzPSIzIiBzdGl0Y2hUaWxlcz0ic3RpdGNoIi8+PC9maWx0ZXI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsdGVyPSJ1cmwoI25vaXNlKSIgb3BhY2l0eT0iMSIvPjwvc3ZnPg==');">
            </div>

            <div class="absolute -top-40 -right-40 w-96 h-96 bg-gold-500/10 rounded-full blur-[120px]"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gold-900/10 rounded-full blur-[120px]"></div>
        </div>

        <div
            class="max-w-md w-full bg-zinc-900/80 backdrop-blur-xl border border-gold-500/20 rounded-2xl p-8 shadow-[0_0_50px_rgba(0,0,0,0.5)] text-center relative overflow-hidden z-10">

            <!-- Top Gradient Line -->
            <div
                class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent opacity-70">
            </div>

            <h1
                class="text-2xl sm:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gold-300 to-gold-600 mb-8 cinzel tracking-widest uppercase filter drop-shadow-sm">
                Validación de Ingreso
            </h1>

            @if($user->balance <= 0)
                <div class="mb-10 transform transition-all hover:scale-105 duration-300">
                    <div
                        class="inline-flex items-center justify-center w-28 h-28 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/50 shadow-[0_0_30px_rgba(16,185,129,0.2)] mb-5 relative">
                        <div class="absolute inset-0 rounded-full border-2 border-emerald-500/20 blur-sm"></div>
                        <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-white mb-2 tracking-tight">ACCESO PERMITIDO</h2>
                    <div class="inline-block px-4 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20">
                        <p class="text-emerald-400 text-sm font-medium">Pago Completado</p>
                    </div>
                </div>
            @else
                <div class="mb-10 transform transition-all hover:scale-105 duration-300">
                    <div
                        class="inline-flex items-center justify-center w-28 h-28 rounded-full bg-red-500/10 text-red-500 border border-red-500/50 shadow-[0_0_30px_rgba(239,68,68,0.2)] mb-5 relative">
                        <div class="absolute inset-0 rounded-full border-2 border-red-500/20 blur-sm"></div>
                        <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-black text-white mb-2 tracking-tight">ACCESO DENEGADO</h2>
                    <div class="inline-block px-4 py-1 rounded-full bg-red-500/10 border border-red-500/20">
                        <p class="text-red-400 text-sm font-medium">Saldo Pendiente</p>
                    </div>
                </div>
            @endif

            <!-- RESULT CARD (White Paper Style) -->
            <div
                class="bg-white rounded-3xl p-8 text-left space-y-6 mb-8 border border-gray-200 shadow-[0_0_40px_rgba(0,0,0,0.2)] relative z-10">

                <!-- Campista Info -->
                <div class="flex flex-col border-b border-gray-100 pb-4">
                    <label class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-1">Campista</label>
                    <span class="text-2xl text-gray-900 font-bold tracking-tight cinzel">{{ $user->name }}
                        {{ $user->last_name }}</span>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label
                            class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-1">Documento</label>
                        <span class="text-sm text-gray-800 font-mono font-bold">{{ $user->document_number }}</span>
                    </div>
                    <div class="flex flex-col text-right">
                        <label class="text-[10px] text-gray-400 uppercase tracking-widest font-bold mb-1">Zona</label>
                        <span class="text-sm text-gray-800 font-bold">{{ $user->zone }}</span>
                    </div>
                </div>

                <!-- Financial Status -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 mt-4">
                    <div class="flex justify-between items-center mb-1">
                        <label class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">Estado
                            Financiero</label>
                        <span
                            class="text-xs font-bold px-2 py-1 rounded-md {{ $user->balance <= 0 ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : 'bg-red-100 text-red-700 border border-red-200' }}">
                            {{ $user->balance <= 0 ? '• PAZ Y SALVO' : '• PENDIENTE' }}
                        </span>
                    </div>
                    @if($user->balance > 0)
                        <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-200">
                            <label class="text-xs text-red-500 font-medium">Saldo a Pagar:</label>
                            <span
                                class="text-xl font-black text-red-600 font-mono">${{ number_format($user->balance, 0, ',', '.') }}</span>
                        </div>
                    @else
                        <div class="flex items-center gap-2 mt-2">
                            <i class="fas fa-check-circle text-emerald-500"></i> <span
                                class="text-xs text-emerald-600 font-medium">Ticket 100% Pagado</span>
                        </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('tickets.scan') }}"
                class="block w-full bg-gradient-to-r from-gold-500 to-yellow-600 hover:from-gold-400 hover:to-yellow-500 text-black font-extrabold py-4 px-6 rounded-xl transition-all transform hover:-translate-y-1 shadow-[0_10px_30px_-10px_rgba(212,175,55,0.6)] uppercase tracking-widest text-sm">
                <i class="fas fa-qrcode mr-2"></i> Escanear Siguiente
            </a>

            <div class="mt-6 text-center">
                <p class="text-[10px] text-zinc-600 uppercase tracking-widest">Sistema de Validación Investi2</p>
            </div>

        </div>
    </div>
</x-layouts.app>