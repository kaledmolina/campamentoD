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

        @if ($registration_step === 0)
            <!-- PASO 0: Pregunta Inicial -->
            <div class="text-center py-10 animate-fade-in">
                <i class="fas fa-question-circle text-6xl text-gold-500 mb-6"></i>
                <h3 class="text-2xl font-cinzel text-white mb-4">Antes de Iniciar</h3>
                <p class="text-gray-300 mb-8 text-lg">Para continuar con tu registro, por favor confirma tu rango de edad.
                </p>

                <div class="flex flex-col md:flex-row justify-center gap-6">
                    <button wire:click="selectMinor"
                        class="group relative bg-black/40 border border-gray-600 hover:border-gold-500 p-6 rounded-xl transition-all hover:scale-105 w-full md:w-64">
                        <div
                            class="absolute inset-0 bg-gold-500/10 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl">
                        </div>
                        <i class="fas fa-child text-4xl text-gray-400 group-hover:text-gold-500 mb-3 block"></i>
                        <span class="block font-bold text-white text-lg">Soy Menor de Edad</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-300">Menos de 18 años</span>
                    </button>

                    <button wire:click="selectAdult"
                        class="group relative bg-black/40 border border-gray-600 hover:border-gold-500 p-6 rounded-xl transition-all hover:scale-105 w-full md:w-64">
                        <div
                            class="absolute inset-0 bg-gold-500/10 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl">
                        </div>
                        <i class="fas fa-user text-4xl text-gray-400 group-hover:text-gold-500 mb-3 block"></i>
                        <span class="block font-bold text-white text-lg">Soy Mayor de Edad</span>
                        <span class="text-xs text-gray-500 group-hover:text-gray-300">18 años o más</span>
                    </button>
                </div>
            </div>

        @elseif ($registration_step === 1)
            <!-- PASO 1: Advertencia Menores -->
            <div class="text-center py-10 animate-fade-in">
                <div
                    class="w-20 h-20 bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-500/50">
                    <i class="fas fa-exclamation-triangle text-4xl text-red-500"></i>
                </div>

                <h3 class="text-2xl font-cinzel text-white mb-4">¡Atención Campista!</h3>
                <p class="text-gray-300 mb-6 max-w-lg mx-auto leading-relaxed">
                    Al ser menor de edad, para completar tu inscripción es <strong class="text-red-400">OBLIGATORIO</strong>
                    que adjuntes el consentimiento firmado por tus padres o acudiente.
                </p>

                <div class="bg-gray-800/50 p-6 rounded-xl border border-gray-700 max-w-md mx-auto mb-8">
                    <h4 class="text-gold-500 text-sm font-bold uppercase tracking-widest mb-3">Instrucciones</h4>
                    <ol class="text-left text-sm text-gray-400 space-y-2 list-decimal list-inside">
                        <li>Descarga el formato de consentimiento.</li>
                        <li>Imprímelo y pide a tus padres que lo firmen.</li>
                        <li>Escanea o toma una foto clara del documento.</li>
                        <li>Ten el archivo listo para subirlo en el siguiente paso.</li>
                    </ol>
                </div>

                <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                    <a href="/pdf/FormularioMenordeEdad -.pdf" download
                        class="flex items-center gap-2 bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition border border-gray-500">
                        <i class="fas fa-file-download"></i> Descargar Formato PDF
                    </a>

                    <button wire:click="proceedToForm"
                        class="flex items-center gap-2 bg-gradient-to-r from-orange-600 to-gold-500 hover:from-gold-500 hover:to-orange-500 text-black font-bold py-3 px-8 rounded-lg shadow-lg hover:shadow-gold-500/20 transition transform hover:scale-105">
                        Ya lo tengo, Continuar <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

        @elseif ($registration_step === 2)
            <!-- PASO 2: Formulario -->
            <form wire:submit="save" class="space-y-6 relative z-10 animate-fade-in">
                <button type="button" wire:click="$set('registration_step', 0)"
                    class="mb-4 text-xs text-gray-500 hover:text-gold-500 transition flex items-center gap-1">
                    <i class="fas fa-arrow-left"></i> Volver a selección de edad
                </button>
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
                            <select wire:model.live="zone"
                                class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all">
                                <option value="">Elige</option>
                                <option value="Zona Monteria">Zona Monteria</option>
                                <option value="Zona Alto San Jorge">Zona Alto San Jorge</option>
                                <option value="Zona Planeta Rica">Zona Planeta Rica</option>
                                <option value="Zona La Mojana">Zona La Mojana</option>
                                <option value="Zona Alto Sinu">Zona Alto Sinu</option>
                                <option value="Zona Bajo Sinu">Zona Bajo Sinu</option>
                                <option value="Zona Medio Sinu">Zona Medio Sinu</option>
                                <option value="Zona San Marcos">Zona San Marcos</option>
                                <option value="Zona Sahagun">Zona Sahagun</option>
                                <option value="Zona Franja del Mar">Zona Franja del Mar</option>
                                <option value="Otro">Otro</option>
                            </select>
                            @error('zone') <span class="text-red-500 text-xs mt-1 block"><i
                            class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror

                            @if($zone === 'Otro')
                                <div class="mt-3 animate-pulse-slow">
                                    <label
                                        class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">¿Cuál?</label>
                                    <input wire:model="other_zone" type="text"
                                        class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-600 border-gold-500"
                                        placeholder="Escribe tu zona">
                                    @error('other_zone') <span class="text-red-500 text-xs mt-1 block"><i
                                    class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                                </div>
                            @endif
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

                <!-- Sección Menores de Edad -->
                @if (($age && $age < 18) || $is_minor_flow)
                    <div class="border border-red-500/50 bg-red-900/10 p-4 rounded-lg mb-6 animate-pulse-slow">
                        <h3 class="text-lg font-bold text-red-500 mb-2 flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle"></i> Requisito para Menores de Edad
                        </h3>
                        <p class="text-sm text-gray-300 mb-4">
                            Al ser menor de edad, es <strong>obligatorio</strong> adjuntar el consentimiento firmado por tus
                            padres o acudiente legal.
                        </p>

                        <a href="/pdf/FormularioMenordeEdad -.pdf" download
                            class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition mb-4 text-xs uppercase tracking-wide">
                            <i class="fas fa-file-pdf"></i> Descargar Consentimiento PDF
                        </a>

                        <div>
                            <label class="block text-gray-300 text-xs font-bold mb-2 uppercase tracking-wide">Subir
                                Consentimiento Firmado *</label>
                            <input wire:model="consent_proof" type="file"
                                class="w-full py-2 px-4 rounded-lg border border-dashed border-gray-600 bg-black/20 text-gray-400 cursor-pointer hover:border-red-500 transition">

                            @error('consent_proof') <span class="text-red-500 text-xs mt-1 block"><i
                            class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror

                            <div wire:loading wire:target="consent_proof"
                                class="text-sm text-red-500 mt-2 flex items-center gap-2">
                                <i class="fas fa-spinner fa-spin"></i> Cargando archivo...
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Sección Pago -->
                <div>
                    <h3 class="text-lg font-bold text-gray-400 mb-4 flex items-center gap-2">
                        <i class="fas fa-receipt text-gold-500"></i> Pago Inicial
                    </h3>
                    <div class="bg-white/5 p-4 rounded-lg border border-gold-500/20 mb-4">
                        <p class="text-sm text-gray-300 mb-2">Para asegurar tu cupo debes realizar un abono mínimo del
                            <strong>10% ($30.000)</strong>.
                        </p>
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
        @endif
    </div>
</div>