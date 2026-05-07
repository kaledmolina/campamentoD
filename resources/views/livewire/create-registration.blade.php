<div class="max-w-3xl mx-auto">
    <div class="glass-premium p-4 md:p-8 rounded-2xl shadow-2xl relative overflow-hidden">
        <!-- Glow Effect -->
        <div
            class="absolute top-0 right-0 w-64 h-64 bg-gold-500/10 rounded-full filter blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>

        <h2 class="text-3xl font-cinzel text-center text-prestige-100 mb-2">Formulario de Inscripción</h2>
        <p class="text-center text-gold-500 uppercase tracking-widest text-sm mb-8">Campamento Distrital Juvenil 2026
        </p>

        @if ($registration_success)
            <div
                class="bg-green-900/20 border border-green-500/50 text-green-200 px-8 py-12 rounded-lg relative mb-6 text-center shadow-[0_0_15px_rgba(34,197,94,0.3)] animate-fade-in backdrop-blur-sm">
                <div class="mb-6">
                    <i class="fas fa-check-circle text-6xl text-green-400 animate-bounce"></i>
                </div>
                <strong class="font-bold text-3xl block mb-4 font-cinzel text-white">¡Registro Exitoso!</strong>
                <span class="block text-lg text-prestige-100/80 max-w-lg mx-auto leading-relaxed">
                    Tu inscripción ha sido recibida y está pendiente de aprobación. <br>
                    Puedes consultar tu estado con tu número de documento.
                </span>

                <div class="mt-8">
                    <a href="{{ route('consultation') }}"
                        class="inline-block bg-gold-500 hover:bg-gold-400 text-black font-bold py-3 px-8 rounded-full transition transform hover:scale-105 uppercase tracking-widest shadow-lg">
                        Consultar Estado
                    </a>
                </div>

                <!-- Confetti Script -->
                <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
                <script>
                    document.addEventListener('livewire:initialized', () => {
                        triggerConfetti();
                    });

                    // Trigger immediately if just loaded with success
                    triggerConfetti();

                    function triggerConfetti() {
                        var duration = 3 * 1000;
                        var animationEnd = Date.now() + duration;
                        var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

                        function randomInRange(min, max) {
                            return Math.random() * (max - min) + min;
                        }

                        var interval = setInterval(function () {
                            var timeLeft = animationEnd - Date.now();

                            if (timeLeft <= 0) {
                                return clearInterval(interval);
                            }

                            var particleCount = 50 * (timeLeft / duration);
                            // since particles fall down, start a bit higher than random
                            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
                            confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
                        }, 250);
                    }
                </script>
            </div>
        @else

            @if ($registration_step === 0)
                <!-- PASO 0: Pregunta Inicial -->
                <div class="text-center py-10 animate-fade-in">
                    <i class="fas fa-question-circle text-6xl text-gold-500 mb-6"></i>
                    <h3 class="text-2xl font-cinzel text-white mb-4">Antes de Iniciar</h3>
                    <p class="text-prestige-100/80 mb-8 text-lg">Para continuar con tu registro, por favor confirma tu rango de edad.
                    </p>

                    <div class="flex flex-col md:flex-row justify-center gap-6">
                        <button wire:click="selectMinor"
                            class="group relative bg-prestige-900/40 border border-prestige-700 hover:border-gold-500 p-6 rounded-xl transition-all hover:scale-105 w-full md:w-64 backdrop-blur-sm">
                            <div
                                class="absolute inset-0 bg-gold-500/10 opacity-0 group-hover:opacity-100 transition duration-300 rounded-xl">
                            </div>
                            <i class="fas fa-child text-4xl text-gray-400 group-hover:text-gold-500 mb-3 block"></i>
                            <span class="block font-bold text-white text-lg">Soy Menor de Edad</span>
                            <span class="text-xs text-gray-500 group-hover:text-gray-300">Menos de 18 años</span>
                        </button>

                        <button wire:click="selectAdult"
                            class="group relative bg-prestige-900/40 border border-prestige-700 hover:border-gold-500 p-6 rounded-xl transition-all hover:scale-105 w-full md:w-64 backdrop-blur-sm">
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
                    <p class="text-prestige-100/80 mb-6 max-w-lg mx-auto leading-relaxed">
                        Al ser menor de edad, para completar tu inscripción es <strong class="text-red-400">OBLIGATORIO</strong>
                        que adjuntes el consentimiento firmado por tus padres o acudiente.
                    </p>

                    <div class="bg-prestige-900/50 p-6 rounded-xl border border-prestige-700 max-w-md mx-auto mb-8">
                        <h4 class="text-gold-500 text-sm font-bold uppercase tracking-widest mb-3">Instrucciones</h4>
                        <ol class="text-left text-sm text-prestige-100/60 space-y-2 list-decimal list-inside">
                            <li>Descarga el formato de consentimiento.</li>
                            <li>Imprímelo y pide a tus padres que lo firmen.</li>
                            <li>Escanea o toma una foto clara del documento.</li>
                            <li>Ten el archivo listo para subirlo en el siguiente paso.</li>
                        </ol>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center items-center gap-4">
                        <a href="/pdf/FormularioMenordeEdad -.pdf" download
                            class="flex items-center gap-2 bg-prestige-800 hover:bg-prestige-700 text-white font-bold py-3 px-6 rounded-lg transition border border-prestige-600">
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
                        class="mb-4 text-xs text-prestige-100/60 hover:text-gold-500 transition flex items-center gap-1">
                        <i class="fas fa-arrow-left"></i> Volver a selección de edad
                    </button>

                    <!-- SELECCIÓN DE PLAN -->
                    <div class="bg-prestige-900/40 p-6 rounded-xl border border-gold-500/20 mb-8 backdrop-blur-sm shadow-lg">
                        <h3
                            class="text-xl font-cinzel text-gold-500 mb-6 flex items-center gap-2 border-b border-prestige-800 pb-3">
                            <i class="fas fa-ticket-alt"></i> Elige tu Plan de Inscripción
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <!-- Plan Total -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" wire:model.live="registration_type" value="total" class="peer sr-only">
                                <div
                                    class="p-5 rounded-xl border-2 transition-all duration-300 h-full flex flex-col
                                                                            peer-checked:border-gold-500 peer-checked:bg-gold-900/10 peer-checked:shadow-[0_0_20px_rgba(234,179,8,0.1)]
                                                                            border-prestige-800 hover:border-prestige-600 bg-prestige-950/30">

                                    <div class="flex justify-between items-start mb-2">
                                        <div class="text-gold-500 font-bold text-lg uppercase tracking-wide">Investidura Total
                                        </div>
                                        <i
                                            class="fas fa-check-circle text-gold-500 text-xl opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                                    </div>

                                    <div class="text-3xl font-bold text-white mb-4">$300.000 <span
                                            class="text-xs text-gray-400 font-normal">COP</span></div>

                                    <ul class="space-y-2 text-sm text-gray-400 mt-auto">
                                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500 text-xs"></i>
                                            Acceso completo (3 días)</li>
                                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500 text-xs"></i>
                                            Alimentación completa</li>
                                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500 text-xs"></i>
                                            Hospedaje incluido</li>
                                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500 text-xs"></i>
                                            Kit de Bienvenida Premium</li>
                                    </ul>
                                </div>
                            </label>

                            <!-- Plan Parcial -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" wire:model.live="registration_type" value="partial" class="peer sr-only">
                                <div
                                    class="p-5 rounded-xl border-2 transition-all duration-300 h-full flex flex-col
                                                                            peer-checked:border-orange-500 peer-checked:bg-orange-900/10 peer-checked:shadow-[0_0_20px_rgba(249,115,22,0.1)]
                                                                            border-prestige-800 hover:border-prestige-600 bg-prestige-950/30">

                                    <div class="flex justify-between items-start mb-2">
                                        <div
                                            class="text-gray-300 peer-checked:text-orange-500 font-bold text-lg uppercase tracking-wide transition-colors">
                                            Estadía Parcial</div>
                                        <i
                                            class="fas fa-check-circle text-orange-500 text-xl opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                                    </div>

                                    <div class="text-3xl font-bold text-white mb-4">$120.000 <span
                                            class="text-xs text-gray-400 font-normal">COP</span></div>

                                    <ul class="space-y-2 text-sm text-gray-400 mt-auto">
                                        <li class="flex items-center gap-2"><i class="fas fa-clock text-orange-500 text-xs"></i>
                                            Acceso limitado (1 día)</li>
                                        <li class="flex items-center gap-2"><i
                                            class="fas fa-utensils text-gray-500 text-xs"></i> Alimentación parcial</li>
                                        <li class="flex items-center gap-2"><i class="fas fa-times text-red-500 text-xs"></i>
                                            Sin Hospedaje</li>
                                        <li class="flex items-center gap-2"><i class="fas fa-check text-green-500 text-xs"></i>
                                            Kit Básico</li>
                                    </ul>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- Sección Personal -->
                    <div class="border-b border-prestige-800 pb-6 mb-6">
                        <h3 class="text-lg font-bold text-prestige-100/80 mb-4 flex items-center gap-2">
                            <i class="fas fa-user text-gold-500"></i> Datos Personales
                        </h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="md:col-span-1">
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Nombres
                                    *</label>
                                <input wire:model="name" type="text"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="Tus nombres">
                                @error('name') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-1">
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Apellidos
                                    *</label>
                                <input wire:model="last_name" type="text"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="Tus apellidos">
                                @error('last_name') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Correo
                                    Electrónico *</label>
                                <input wire:model="email" type="email"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="ejemplo@correo.com">
                                @error('email') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Tipo de
                                    documento *</label>
                                <select wire:model="document_type"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all text-gray-200">
                                    <option value="">Seleccione...</option>
                                    @if(!$is_minor_flow)
                                        <option value="CC">Cédula de Ciudadanía</option>
                                    @endif

                                    @if($is_minor_flow)
                                        <option value="TI">Tarjeta de Identidad</option>
                                    @endif

                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('document_type') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Número de
                                    documento *</label>
                                <input wire:model="document_number" type="text"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="Sin puntos ni guiones">
                                @error('document_number') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Fecha de
                                    Expedición (Documento) *</label>
                                <input wire:model="document_issue_date" type="date"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50 block text-gray-300">
                                @error('document_issue_date') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Sexo *</label>
                                <select wire:model="gender"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all">
                                    <option value="">Seleccione...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                                @error('gender') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Fecha de
                                    Nacimiento *</label>
                                <input wire:model="birth_date" type="date"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50 text-gray-300">
                                @error('birth_date') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Edad *</label>
                                <input wire:model="age" type="number"
                                    x-on:input="if($el.value == 666) { document.getElementById('demon-game-modal').classList.remove('hidden'); initDemonGame(); }"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50">
                                @error('age') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">EPS *</label>
                                <input wire:model="eps" type="text"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="Nombre EPS">
                                @error('eps') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Celular
                                    *</label>
                                <input wire:model="phone" type="tel"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                    placeholder="300 123 4567">
                                @error('phone') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección Eclesiástica -->
                    <div class="border-b border-prestige-800 pb-6 mb-6">
                        <h3 class="text-lg font-bold text-prestige-100/80 mb-4 flex items-center gap-2">
                            <i class="fas fa-church text-gold-500"></i> Datos Eclesiásticos
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Zona *</label>
                                <select wire:model.live="zone"
                                    class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all">
                                    <option value="">Elige</option>
                                    @foreach(array_keys(\App\Filament\Resources\UserResource::getZonesData()) as $zoneName)
                                        <option value="{{ $zoneName }}">{{ $zoneName }}</option>
                                    @endforeach
                                    <option value="Otro Distrito">Otro Distrito</option>
                                </select>
                                @error('zone') <span class="text-red-500 text-xs mt-1 block"><i
                                class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror

                                @if($zone === 'Otro Distrito')
                                    <!-- Lógica de Otro Distrito Oculta Temporalmente -->
                                    <div class="mt-4 p-4 bg-prestige-900/50 rounded-lg border border-gold-500/30">

                                        <div class="mb-4">
                                            <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">¿Cuál
                                                Zona?</label>
                                            <input wire:model="other_zone" type="text"
                                                class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50 border-gold-500"
                                                placeholder="Escribe tu zona">
                                            @error('other_zone') <span class="text-red-500 text-xs mt-1 block"><i
                                            class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                                        </div>

                                        <h4 class="text-gold-500 font-bold mb-2 text-sm uppercase tracking-wide"><i
                                                class="fas fa-file-signature mr-2"></i>Autorización Pastoral Requerida</h4>
                                        <p class="text-prestige-100/60 text-xs mb-4">
                                            Al pertenecer a otro distrito, es necesario que descargues la carta de aval, la hagas
                                            firmar por tu pastor y la subas aquí.
                                        </p>

                                        <div class="mb-4">
                                            <a href="/pdf/CartaAval.pdf" download
                                                class="bg-gold-500/10 hover:bg-gold-500/20 text-gold-500 border border-gold-500 font-bold py-2 px-4 rounded-lg transition-all inline-flex items-center text-sm w-full justification-center">
                                                <i class="fas fa-download mr-2"></i> Descargar Carta Modelo
                                            </a>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Adjuntar
                                                Carta Firmada *</label>
                                            <div class="relative group cursor-pointer">
                                                <input type="file" wire:model="pastor_letter" id="pastor_letter" class="hidden"
                                                    accept="image/*">
                                                <label for="pastor_letter"
                                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-prestige-700 rounded-lg hover:border-gold-500 hover:bg-prestige-900/50 transition-all cursor-pointer">

                                                    @if ($pastor_letter)
                                                        <div class="relative w-full h-full p-2">
                                                            <img src="{{ $pastor_letter->temporaryUrl() }}"
                                                                class="w-full h-full object-contain rounded-lg">
                                                            <div
                                                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                                                                <p class="text-white font-bold text-xs"><i
                                                                        class="fas fa-sync-alt mr-2"></i>Cambiar</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                            <i
                                                                class="fas fa-file-upload text-2xl text-gray-400 mb-2 group-hover:text-gold-500 transition-colors"></i>
                                                            <p class="mb-1 text-xs text-gray-400"><span class="font-bold">Clic para
                                                                    subir</span></p>
                                                            <p class="text-[10px] text-gray-500">IMG, PNG, JPG (MAX. 10MB)</p>
                                                        </div>
                                                    @endif
                                                </label>
                                            </div>
                                            @error('pastor_letter') <span class="text-red-500 text-xs mt-1 block"><i
                                            class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Congregación
                                    *</label>

                                @if($zone === 'Otro Distrito')
                                    <input wire:model="congregacion" type="text"
                                        class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50"
                                        placeholder="Nombre de tu congregación">
                                @else
                                    <select wire:model="congregacion"
                                        class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all text-gray-200"
                                        @if(empty($congregations)) disabled @endif>
                                        <option value="">Seleccione...</option>
                                        @foreach($congregations as $congregation)
                                            <option value="{{ $congregation }}">{{ $congregation }}</option>
                                        @endforeach
                                    </select>
                                    @if(empty($congregations) && $zone)
                                        <p class="text-xs text-yellow-500 mt-1">No hay congregaciones registradas para esta zona.</p>
                                    @endif
                                @endif

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
                            <p class="text-sm text-prestige-100/80 mb-4">
                                Al ser menor de edad, es <strong>obligatorio</strong> adjuntar el consentimiento firmado por tus
                                padres o acudiente legal.
                            </p>

                            <a href="/pdf/FormularioMenordeEdad -.pdf" download
                                class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition mb-4 text-xs uppercase tracking-wide">
                                <i class="fas fa-file-pdf"></i> Descargar Consentimiento PDF
                            </a>

                            <div>
                                <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Subir
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

                    <!-- Sección Descuentos (Oculta Temporalmente) -->
                    <!-- Sección Descuentos -->
                     <div class="border-b border-prestige-800 pb-6 mb-6">
                        <h3 class="text-lg font-bold text-prestige-100/80 mb-4 flex items-center gap-2">
                            <i class="fas fa-tag text-gold-500"></i> Código de Promoción
                        </h3>
                        <div class="bg-prestige-900/40 p-4 rounded-lg border border-prestige-700">
                            <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">¿Tienes un
                                código?</label>
                            <div class="flex gap-2">
                                <input wire:model="discountCode" type="text"
                                    class="w-full py-2 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50 bg-black/20 text-white uppercase"
                                    placeholder="INGRESA TU CÓDIGO">
                                <button type="button" wire:click="applyDiscount"
                                    class="bg-gold-500 hover:bg-gold-400 text-black font-bold py-2 px-4 rounded-lg transition uppercase text-xs">
                                    Aplicar
                                </button>
                            </div>

                            @error('discountCode')
                            <span class="text-red-500 text-xs mt-2 block"><i class="fas fa-times-circle"></i>
                                {{ $message }}</span>
                            @enderror

                            @if($discountMessage)
                            <div class="mt-2 text-green-400 text-sm font-bold flex items-center gap-2 animate-fade-in">
                                <i class="fas fa-check-circle"></i> {{ $discountMessage }}
                            </div>
                            <div class="mt-1 text-gray-400 text-xs">
                                El descuento se aplicará al costo total del campamento.
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Sección Pago -->
                    @if($appliedDiscount !== 100)
                    <div>
                        <h3 class="text-lg font-bold text-prestige-100/80 mb-4 flex items-center gap-2">
                            <i class="fas fa-receipt text-gold-500"></i> Pago Inicial
                        </h3>
                        <div class="bg-white/5 p-4 rounded-lg border border-gold-500/20 mb-4">
                            <p class="text-sm text-prestige-100/80 mb-2">Para asegurar tu cupo debes realizar un abono mínimo del
                                <strong>10% ($30.000)</strong>.
                            </p>
                            <p class="text-xs text-gold-500 italic">Formatos permitidos: JPG, PNG, PDF (Máx 10MB)</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Valor Consignado *</label>
                            <input wire:model="payment_amount" type="number"
                                class="w-full py-3 px-4 rounded-lg focus:outline-none transition-all placeholder-gray-500/50 bg-black/20 text-gray-200 border border-gray-600 focus:border-gold-500"
                                placeholder="Ej: 30000">
                            @error('payment_amount') <span class="text-red-500 text-xs mt-1 block"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                        </div>

                        <label class="block text-prestige-100/60 text-xs font-bold mb-2 uppercase tracking-wide">Subir Comprobante
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
                    @endif

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-orange-600 to-gold-500 hover:from-gold-500 hover:to-orange-500 text-black font-bold py-4 px-6 rounded-lg focus:outline-none focus:shadow-[0_0_20px_rgba(255,165,0,0.5)] transition duration-300 transform hover:scale-[1.02] uppercase tracking-widest shadow-lg">
                            Completar Inscripción <i class="fas fa-arrow-right ml-2 opacity-70"></i>
                        </button>
                    </div>
                </form>
            @endif
        @endif
    </div>

    <!-- EASTER EGG: DEMON PONG -->
    <div id="demon-game-modal" class="fixed inset-0 z-[100] bg-black hidden flex items-center justify-center">
        <div class="relative w-full h-full max-w-4xl max-h-[80vh] flex flex-col items-center justify-center p-4">
            <h2 class="text-4xl font-cinzel text-red-600 mb-4 animate-pulse">¡RESISTE AL DIABLO!</h2>
            <p class="text-gold-500 mb-4 uppercase tracking-widest text-sm">Usa el mouse para controlar la barra</p>

            <canvas id="pongCanvas" width="800" height="600"
                class="bg-black border-4 border-red-900 shadow-[0_0_50px_rgba(255,0,0,0.5)] rounded-lg cursor-none"></canvas>

            <button onclick="closeDemonGame()"
                class="mt-8 px-6 py-2 border border-gray-600 text-gray-400 hover:text-white hover:border-white rounded uppercase tracking-widest transition">
                Huir de la tentación (Salir)
            </button>
        </div>
    </div>

    <script>
        let gameRunning = false;
        let animationId;
        const canvas = document.getElementById('pongCanvas');
        const ctx = canvas.getContext('2d');

        // Game Objects
        const ball = { x: 400, y: 300, radius: 10, speed: 7, dx: 5, dy: 5, color: '#D4AF37' };
        const paddlePlayer = { x: 350, y: 580, width: 100, height: 10, color: '#fff', score: 0 };
        const paddleAI = { x: 350, y: 10, width: 100, height: 10, color: '#ef4444', score: 0, speed: 4 }; // Red for Enemy

        function initDemonGame() {
            if (gameRunning) return;
            gameRunning = true;
            resizeCanvas();
            resetBall();
            animationId = requestAnimationFrame(gameLoop);

            // Mouse listener
            canvas.addEventListener('mousemove', (e) => {
                const rect = canvas.getBoundingClientRect();
                paddlePlayer.x = e.clientX - rect.left - paddlePlayer.width / 2;
            });
        }

        function closeDemonGame() {
            gameRunning = false;
            cancelAnimationFrame(animationId);
            document.getElementById('demon-game-modal').classList.add('hidden');
        }

        function resizeCanvas() {
            // Simple responsive fix if needed, but keeping fixed for now to avoid logic mess
        }

        function resetBall() {
            ball.x = canvas.width / 2;
            ball.y = canvas.height / 2;
            ball.dx = -ball.dx;
            ball.speed = 7;
        }

        function update() {
            // Move Ball
            ball.x += ball.dx;
            ball.y += ball.dy;

            // Wall Collision
            if (ball.x + ball.radius > canvas.width || ball.x - ball.radius < 0) {
                ball.dx = -ball.dx;
            }

            // Paddle Collision (Player)
            if (ball.y + ball.radius > paddlePlayer.y &&
                ball.x > paddlePlayer.x && ball.x < paddlePlayer.x + paddlePlayer.width) {
                ball.dy = -ball.speed;
                ball.y = paddlePlayer.y - ball.radius; // snap
                ball.speed += 0.5; // Increase difficulty
            }

            // Paddle Collision (AI)
            if (ball.y - ball.radius < paddleAI.y + paddleAI.height &&
                ball.x > paddleAI.x && ball.x < paddleAI.x + paddleAI.width) {
                ball.dy = ball.speed;
                ball.y = paddleAI.y + paddleAI.height + ball.radius; // snap
            }

            // Scoring
            if (ball.y + ball.radius > canvas.height) {
                paddleAI.score++;
                resetBall();
            } else if (ball.y - ball.radius < 0) {
                paddlePlayer.score++;
                resetBall();
            }

            // AI Movement
            // AI tries to follow ball
            let targetX = ball.x - (paddleAI.width / 2);
            // Add some randomness/error or speed limit
            if (paddleAI.x < targetX) {
                paddleAI.x += paddleAI.speed;
            } else {
                paddleAI.x -= paddleAI.speed;
            }

            // Keep AI in bounds
            if (paddleAI.x < 0) paddleAI.x = 0;
            if (paddleAI.x + paddleAI.width > canvas.width) paddleAI.x = canvas.width - paddleAI.width;

            // Check Win Condition (First to 5)
            if (paddlePlayer.score >= 5) {
                alert("¡Has vencido al 666!");
                closeDemonGame();
                paddlePlayer.score = 0;
                paddleAI.score = 0;
            }
        }

        function draw() {
            // Background
            ctx.fillStyle = '#111';
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Net
            ctx.strokeStyle = '#333';
            ctx.setLineDash([10, 15]);
            ctx.beginPath();
            ctx.moveTo(0, canvas.height / 2);
            ctx.lineTo(canvas.width, canvas.height / 2);
            ctx.stroke();
            ctx.setLineDash([]);

            // Ball
            ctx.beginPath();
            ctx.arc(ball.x, ball.y, ball.radius, 0, Math.PI * 2);
            ctx.fillStyle = ball.color;
            ctx.fill();
            ctx.closePath();

            // Player Paddle
            ctx.fillStyle = paddlePlayer.color;
            ctx.fillRect(paddlePlayer.x, paddlePlayer.y, paddlePlayer.width, paddlePlayer.height);

            // AI Paddle
            ctx.fillStyle = paddleAI.color;
            ctx.fillRect(paddleAI.x, paddleAI.y, paddleAI.width, paddleAI.height);

            // Scores
            ctx.font = "50px monospace";
            ctx.fillStyle = "#333";
            ctx.fillText(paddleAI.score, 50, canvas.height / 2 - 50);
            ctx.fillText(paddlePlayer.score, 50, canvas.height / 2 + 80);
        }

        function gameLoop() {
            if (!gameRunning) return;
            update();
            draw();
            animationId = requestAnimationFrame(gameLoop);
        }
    </script>
</div>