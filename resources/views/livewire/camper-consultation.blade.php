<div class="max-w-4xl mx-auto">
    
    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-5xl font-cinzel text-white mb-2">Consulta de Estado</h2>
        <div class="h-1 w-24 bg-gold-500 mx-auto rounded-full"></div>
    </div>

    <!-- Search Section -->
    <div class="glass-card rounded-2xl p-4 md:p-8 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full filter blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        
        <form wire:submit="search" class="flex flex-col md:flex-row gap-4 items-end relative z-10">
            <div class="flex-grow w-full">
                <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Ingrese su Número de Documento</label>
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                    <input wire:model="document_number_search" type="text" class="w-full py-4 pl-12 pr-4 rounded-lg focus:outline-none transition-all placeholder-gray-600 text-lg" placeholder="Ej: 1002345678">
                </div>
                @error('document_number_search') <span class="text-red-500 text-xs mt-1 block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full md:w-auto bg-gold-500 hover:bg-gold-400 text-black font-bold py-4 px-8 rounded-lg shadow-[0_0_15px_rgba(212,175,55,0.3)] transition transform hover:scale-105 uppercase tracking-wide">
                Consultar
            </button>
        </form>
    </div>

    @if ($camper)
        <div class="grid md:grid-cols-2 gap-8" data-aos="fade-up">
            <!-- Camper Info & Status -->
            <div class="glass-card rounded-2xl p-4 md:p-6 h-full border-l-4 border-gold-500">
                <h3 class="text-xl font-bold mb-6 text-white flex items-center gap-2">
                    <i class="fas fa-id-card text-gold-500"></i> Información del Campista
                </h3>
                
                <div class="space-y-4 mb-8">
                    <div>
                        <p class="text-xs text-gray-500 uppercase">Nombre Completo</p>
                        <p class="text-lg font-bold text-white">{{ $camper->name }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Zona</p>
                            <p class="text-white">{{ $camper->zone }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase">Congregación</p>
                            <p class="text-white">{{ $camper->congregacion }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-black/40 rounded-xl p-4 space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-400">Costo Total:</span>
                        <span class="font-bold text-white text-lg">${{ number_format($camper->target_cost, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-green-500">Total Abonado (Aprobado):</span>
                        <span class="font-bold text-green-400 text-lg">${{ number_format($camper->total_paid, 0) }}</span>
                    </div>
                    <div class="h-px bg-gray-700 my-2"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-red-400 font-bold uppercase text-xs">Saldo Pendiente:</span>
                        <span class="font-black text-2xl text-red-500">${{ number_format($camper->balance, 0) }}</span>
                    </div>
                </div>

                <div class="mt-8">
                    <h4 class="font-bold mb-4 text-gray-300 text-sm uppercase border-b border-gray-800 pb-2">Historial de Pagos</h4>
                    <div class="max-h-48 overflow-y-auto pr-2 custom-scrollbar">
                        <table class="w-full text-left border-collapse">
                            <tbody>
                                @foreach($camper->payments()->latest()->get() as $payment)
                                    <tr class="border-b border-gray-800 last:border-0 hover:bg-white/5 transition">
                                        <td class="py-3 text-gray-400 text-xs">{{ $payment->created_at->format('d/m/Y') }}</td>
                                        <td class="py-3 font-mono text-white text-sm">${{ number_format($payment->amount, 0) }}</td>
                                        <td class="py-3 text-right">
                                            @if($payment->status == 'approved')
                                                <span class="px-2 py-1 bg-green-900/40 text-green-400 text-xs rounded border border-green-800">Aprobado</span>
                                            @elseif($payment->status == 'pending')
                                                <span class="px-2 py-1 bg-yellow-900/40 text-yellow-400 text-xs rounded border border-yellow-800">Pendiente</span>
                                            @else
                                                <span class="px-2 py-1 bg-red-900/40 text-red-400 text-xs rounded border border-red-800">Rechazado</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Payment Form -->
            <div class="glass-card rounded-2xl p-4 md:p-6 border-t-4 border-green-500 relative overflow-hidden">
                <!-- Background Glow -->
                <div class="absolute top-0 right-0 w-48 h-48 bg-green-500/5 rounded-full filter blur-3xl -translate-y-1/2 translate-x-1/2"></div>

                <h3 class="text-xl font-bold mb-6 text-white flex items-center gap-2 relative z-10">
                    <i class="fas fa-hand-holding-dollar text-green-500"></i> Registrar Nuevo Abono
                </h3>
                
                @if ($payment_success)
                    <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg relative mb-6 shadow-lg">
                        <strong class="font-bold flex items-center gap-2"><i class="fas fa-check"></i> ¡Abono Registrado!</strong>
                        <span class="block text-sm mt-1">Tu abono ha sido subido y está pendiente de aprobación.</span>
                    </div>
                @endif

                <form wire:submit="savePayment" class="space-y-5 relative z-10">
                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Monto a Abonar ($)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                            <input wire:model="amount" type="number" class="w-full py-3 pl-8 pr-4 rounded-lg focus:outline-none transition-all placeholder-gray-600 font-mono text-lg">
                        </div>
                        @error('amount') <span class="text-red-500 text-xs mt-1 block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Comprobante de Pago</label>
                        <input wire:model="payment_proof" type="file" class="w-full py-2 px-4 rounded-lg border border-dashed border-gray-600 bg-black/20 text-gray-400 cursor-pointer hover:border-green-500 transition">
                        @error('payment_proof') <span class="text-red-500 text-xs mt-1 block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        
                        <div wire:loading wire:target="payment_proof" class="text-sm text-green-500 mt-2 flex items-center gap-2">
                            <i class="fas fa-spinner fa-spin"></i> Cargando imagen...
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-4 rounded-lg shadow-[0_0_15px_rgba(34,197,94,0.3)] transition duration-300 hover:scale-[1.02] mt-4 uppercase tracking-widest">
                        Subir Abono <i class="fas fa-upload ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>