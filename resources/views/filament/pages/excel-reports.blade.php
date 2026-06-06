<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 py-4">
        
        <!-- Tarjeta Reporte de Campistas -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-amber-500/10 via-amber-700/5 to-amber-900/20 p-8 border border-amber-500/30 backdrop-blur-md shadow-[0_10px_30px_rgba(212,175,55,0.15)] transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(212,175,55,0.25)] hover:border-amber-500/50 flex flex-col justify-between">
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-amber-500/10 blur-3xl"></div>
            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-amber-500/20 text-amber-400 border border-amber-500/30 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666M12 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666M6 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666M12 7.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9Zm0 0 0 6m0 0 1.5-1.5M12 13.5 10.5 12" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-amber-500 dark:text-amber-400">Reporte de Campistas</h2>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Padrón General & Finanzas</p>
                    </div>
                </div>

                <p class="mb-6 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Descarga la base de datos completa de todos los jóvenes inscritos en el Campamento Juvenil 2026. Este archivo incluye información personal, datos de contacto eclesiástico y un desglose financiero total por participante.
                </p>

                <div class="mb-8 rounded-xl bg-black/5 dark:bg-black/30 p-4 border border-black/5 dark:border-white/5">
                    <h3 class="mb-2 text-xs font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">Columnas Incluidas (26 en total):</h3>
                    <ul class="grid grid-cols-2 gap-x-4 gap-y-1 text-xs text-gray-600 dark:text-gray-300 list-disc list-inside font-medium">
                        <li>ID & Nombres completos</li>
                        <li>Documento & Tipo</li>
                        <li>Zona y Congregación</li>
                        <li>Teléfono & Email</li>
                        <li>Edad, Género, EPS</li>
                        <li>Tipo de Inscripción</li>
                        <li>Costo Base & Cupones</li>
                        <li>Total Pagado & Saldo</li>
                        <li>Estado Carta Pastoral</li>
                        <li>Permiso Menores & Notas</li>
                    </ul>
                </div>
            </div>

            <button 
                wire:click="exportCampers" 
                type="button" 
                class="w-full group flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 py-4 px-6 text-base font-bold text-white shadow-[0_0_25px_rgba(245,158,11,0.4)] transition-all duration-300 hover:from-amber-400 hover:to-amber-500 hover:shadow-[0_0_35px_rgba(245,158,11,0.6)] focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
                wire:target="exportCampers"
            >
                <svg wire:loading.remove wire:target="exportCampers" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <svg wire:loading wire:target="exportCampers" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="exportCampers">Generar y Descargar Excel (Campistas)</span>
                <span wire:loading wire:target="exportCampers">Generando Reporte... ¡Por favor espera!</span>
            </button>
        </div>

        <!-- Tarjeta Reporte de Abonos -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500/10 via-emerald-700/5 to-emerald-900/20 p-8 border border-emerald-500/30 backdrop-blur-md shadow-[0_10px_30px_rgba(16,185,129,0.15)] transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(16,185,129,0.25)] hover:border-emerald-500/50 flex flex-col justify-between">
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-emerald-500/10 blur-3xl"></div>
            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-emerald-500 dark:text-emerald-400">Reporte de Abonos / Pagos</h2>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Transacciones & Auditoría</p>
                    </div>
                </div>

                <p class="mb-6 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Descarga el registro histórico completo de todas las transacciones, abonos y pagos realizados en la plataforma. Incluye detalles de aprobación, administradores revisores y la información cruzada del campista.
                </p>

                <div class="mb-8 rounded-xl bg-black/5 dark:bg-black/30 p-4 border border-black/5 dark:border-white/5">
                    <h3 class="mb-2 text-xs font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">Columnas Incluidas (14 en total):</h3>
                    <ul class="grid grid-cols-2 gap-x-4 gap-y-1 text-xs text-gray-600 dark:text-gray-300 list-disc list-inside font-medium">
                        <li>ID de Pago & Transacción</li>
                        <li>Datos del Campista</li>
                        <li>Zona y Congregación</li>
                        <li>Monto Exacto del Abono</li>
                        <li>Estado (Aprobado/Pendiente)</li>
                        <li>Tipo de Transacción</li>
                        <li>Administrador Revisor</li>
                        <li>Notas y Comentarios</li>
                        <li>Ruta Comprobante (PDF/Img)</li>
                        <li>Fechas de Registro y Revisión</li>
                    </ul>
                </div>
            </div>

            <button 
                wire:click="exportPayments" 
                type="button" 
                class="w-full group flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 py-4 px-6 text-base font-bold text-white shadow-[0_0_25px_rgba(16,185,129,0.4)] transition-all duration-300 hover:from-emerald-400 hover:to-emerald-500 hover:shadow-[0_0_35px_rgba(16,185,129,0.6)] focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
                wire:target="exportPayments"
            >
                <svg wire:loading.remove wire:target="exportPayments" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <svg wire:loading wire:target="exportPayments" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="exportPayments">Generar y Descargar Excel (Abonos)</span>
                <span wire:loading wire:target="exportPayments">Generando Reporte... ¡Por favor espera!</span>
            </button>
        </div>

        <!-- Tarjeta Descarga de Comprobantes por Zona -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-violet-500/10 via-violet-700/5 to-violet-900/20 p-8 border border-violet-500/30 backdrop-blur-md shadow-[0_10px_30px_rgba(139,92,246,0.15)] transition-all duration-300 hover:scale-[1.02] hover:shadow-[0_15px_40px_rgba(139,92,246,0.25)] hover:border-violet-500/50 flex flex-col justify-between">
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-violet-500/10 blur-3xl"></div>
            
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-violet-500/20 text-violet-400 border border-violet-500/30 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-violet-500 dark:text-violet-400">Comprobantes por Zona</h2>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Archivos de Pago (ZIP)</p>
                    </div>
                </div>

                <p class="mb-6 text-sm leading-relaxed text-gray-600 dark:text-gray-200">
                    Selecciona una zona eclesiástica específica para empaquetar y descargar de forma masiva todos los comprobantes de pago subidos por los campistas registrados en dicha zona.
                </p>

                <div class="mb-6">
                    <label for="selectedZone" class="block text-xs font-bold uppercase tracking-wider text-violet-600 dark:text-violet-300 mb-2">Seleccionar Zona:</label>
                    <select 
                        id="selectedZone" 
                        wire:model.live="selectedZone" 
                        class="w-full rounded-xl bg-white dark:bg-gray-800 border border-violet-500/30 dark:border-violet-700 text-gray-900 dark:text-gray-100 py-3 px-4 text-sm focus:border-violet-500 focus:ring-1 focus:ring-violet-500 focus:outline-none transition duration-300"
                    >
                        <option value="" class="bg-white dark:bg-gray-800 text-gray-500">-- Seleccione una zona --</option>
                        @foreach($this->getZones() as $zone)
                            <option value="{{ $zone }}" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">{{ $zone }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button 
                wire:click="exportReceiptsByZone" 
                type="button" 
                class="w-full group flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-violet-500 to-violet-600 py-4 px-6 text-base font-bold text-white shadow-[0_0_25px_rgba(139,92,246,0.4)] transition-all duration-300 hover:from-violet-400 hover:to-violet-500 hover:shadow-[0_0_35px_rgba(139,92,246,0.6)] focus:outline-none focus:ring-2 focus:ring-violet-400 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled"
                wire:target="exportReceiptsByZone"
                @if(empty($selectedZone)) disabled @endif
            >
                <svg wire:loading.remove wire:target="exportReceiptsByZone" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                <svg wire:loading wire:target="exportReceiptsByZone" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="exportReceiptsByZone">Descargar ZIP (Comprobantes)</span>
                <span wire:loading wire:target="exportReceiptsByZone">Empaquetando...</span>
            </button>
        </div>

    </div>
</x-filament-panels::page>
