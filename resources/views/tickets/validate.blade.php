<x-layouts.app>
    <div class="h-screen flex items-center justify-center p-4">
        <div
            class="max-w-md w-full bg-black/80 backdrop-blur-md border border-gold-500/30 rounded-lg p-8 shadow-[0_0_30px_rgba(212,175,55,0.2)] text-center relative overflow-hidden">

            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent">
            </div>

            <h1 class="text-3xl font-bold text-gold-500 mb-6 cinzel tracking-widest uppercase">
                Validación de Ingreso
            </h1>

            @if($user->balance <= 0)
                <div class="mb-8">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-green-500/20 text-green-500 border-2 border-green-500 shadow-[0_0_20px_rgba(34,197,94,0.4)] mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-green-400">PAGO COMPLETADO</h2>
                    <p class="text-gray-400 text-sm mt-1">El campista está autorizado para ingresar.</p>
                </div>
            @else
                <div class="mb-8">
                    <div
                        class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-red-500/20 text-red-500 border-2 border-red-500 shadow-[0_0_20px_rgba(239,68,68,0.4)] mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-red-500">PENDIENTE DE PAGO</h2>
                    <p class="text-gray-400 text-sm mt-1">El campista tiene un saldo pendiente.</p>
                </div>
            @endif

            <div class="bg-white/5 rounded-lg p-6 text-left space-y-3 mb-8 border border-white/10">
                <div class="flex flex-col">
                    <label class="text-xs text-gold-500 uppercase tracking-wider font-bold mb-1">Nombre Campista</label>
                    <span class="text-lg text-white font-medium">{{ $user->name }} {{ $user->last_name }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label class="text-xs text-gold-500 uppercase tracking-wider font-bold mb-1">Documento</label>
                        <span class="text-sm text-gray-300">{{ $user->document_number }}</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-xs text-gold-500 uppercase tracking-wider font-bold mb-1">Zona</label>
                        <span class="text-sm text-gray-300">{{ $user->zone }}</span>
                    </div>
                </div>

                <div class="flex flex-col border-t border-white/10 pt-3 mt-3">
                    <div class="flex justify-between items-center">
                        <label class="text-xs text-gold-500 uppercase tracking-wider font-bold">Estado de Cuenta</label>
                        <span class="text-sm font-bold {{ $user->balance <= 0 ? 'text-green-400' : 'text-red-400' }}">
                            {{ $user->balance <= 0 ? 'PAZ Y SALVO' : 'DEUDA PENDIENTE' }}
                        </span>
                    </div>
                    @if($user->balance > 0)
                        <div class="flex justify-between items-center mt-1">
                            <label class="text-xs text-gray-400">Saldo Restante</label>
                            <span
                                class="text-sm font-bold text-red-400">${{ number_format($user->balance, 0, ',', '.') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('tickets.scan') }}"
                class="inline-block w-full bg-gold-500 hover:bg-gold-400 text-black font-bold py-3 px-6 rounded-lg transition transform hover:scale-[1.02] shadow-[0_0_15px_rgba(212,175,55,0.4)] uppercase tracking-wide">
                <i class="fas fa-qrcode mr-2"></i> Escanear Otro
            </a>

        </div>
    </div>
</x-layouts.app>