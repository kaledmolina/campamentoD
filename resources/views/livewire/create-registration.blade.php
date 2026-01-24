<div class="max-w-3xl mx-auto">
    <div class="glass-card p-8 rounded-2xl shadow-2xl relative overflow-hidden">
        <!-- Glow Effect -->
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-gold-500/10 rounded-full filter blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>

        <h2 class="text-3xl font-cinzel text-center text-white mb-2">Formulario de Inscripción</h2>
        <p class="text-center text-gold-500 uppercase tracking-widest text-sm mb-8">Campamento Distrital Juvenil 2026
        </p>

        @if ($registration_success)
            <div
                class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-4 rounded-lg relative mb-6 text-center shadow-[0_0_15px_rgba(34,197,94,0.3)]">
                <i class="fas fa-check-circle text-2xl mb-2 block"></i>
                <strong class="font-bold text-lg block">¡Registro Exitoso!</strong>
                <span class="block text-sm mt-1 opacity-90">Tu inscripción ha sido recibida y está pendiente de aprobación.
                    Puedes consultar tu estado con tu número de documento.</span>
            </div>
        @endif

        <form wire:submit="save" class="space-y-6 relative z-10">
            <!-- Sección Personal -->
            <div class="border-b border-gray-700 pb-6 mb-6">
                <h3 class="text-lg font-bold text-gray-400 mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-gold-500"></i> Datos Personales
                </h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Nombres y
                            Apellidos *</label>
                        <input wire:model="name" type="text"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600"
                            placeholder="Ingresa tu nombre completo">
                        @error('name') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Correo
                            Electrónico *</label>
                        <input wire:model="email" type="email"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600"
                            placeholder="ejemplo@correo.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Tipo de
                            documento *</label>
                        <select wire:model="document_type"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all">
                            <option value="">Seleccione...</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('document_type') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Número de
                            documento *</label>
                        <input wire:model="document_number" type="text"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600"
                            placeholder="Sin puntos ni guiones">
                        @error('document_number') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Edad *</label>
                        <input wire:model="age" type="number"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600">
                        @error('age') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Celular
                            *</label>
                        <input wire:model="phone" type="tel"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600"
                            placeholder="300 123 4567">
                        @error('phone') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Sección Eclesiástica -->
            <div class="border-b border-gray-700 pb-6 mb-6">
                <h3 class="text-lg font-bold text-gray-400 mb-4 flex items-center gap-2">
                    <i class="fas fa-church text-gold-500"></i> Datos Eclesiásticos
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Zona *</label>
                        <input wire:model="zone" type="text"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600">
                        @error('zone') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Congregación
                            *</label>
                        <input wire:model="congregacion" type="text"
                            class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600">
                        @error('congregacion') <span class="text-red-500 text-xs mt-1 block"><i
                        class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Sección Pago -->
            <div>
                <h3 class="text-lg font-bold text-gray-400 mb-4 flex items-center gap-2">
                    <i class="fas fa-receipt text-gold-500"></i> Pago Inicial
                </h3>
                <div class="bg-white/5 p-4 rounded-lg border border-gold-500/20 mb-4">
                    <p class="text-sm text-gray-300 mb-2">Para asegurar tu cupo debes realizar un abono mínimo del
                        <strong>10% ($30.000)</strong>.</p>
                    <p class="text-xs text-gold-500 italic">Formatos permitidos: JPG, PNG, PDF (Máx 10MB)</p>
                </div>

                <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Subir Comprobante
                    *</label>
                <input wire:model="payment_proof" type="file"
                    class="w-full py-2 px-4 rounded-lg border border-dashed border-gray-600 bg-black/20 text-gray-400 cursor-pointer hover:border-gold-500 transition">

                @error('payment_proof') <span class="text-red-500 text-xs mt-1 block"><i
                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror

                <div wire:loading wire:target="payment_proof"
                    class="text-sm text-gold-500 mt-2 flex items-center gap-2">
                    <i class="fas fa-spinner fa-spin"></i> Cargando imagen...
                </div>
            </div>

            <div class="pt-6">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-orange-600 to-gold-500 hover:from-gold-500 hover:to-orange-500 text-black font-bold py-4 px-6 rounded-lg focus:outline-none focus:shadow-[0_0_20px_rgba(255,165,0,0.5)] transition duration-300 transform hover:scale-[1.02] uppercase tracking-widest shadow-lg">
                    Completar Inscripción <i class="fas fa-arrow-right ml-2 opacity-70"></i>
                </button>
            </div>
        </form>
    </div>
</div>