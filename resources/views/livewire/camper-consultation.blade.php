<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-900">Consulta de Estado - Campamento 2026</h2>

    <!-- Search Section -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <form wire:submit="search" class="flex gap-4 items-end">
            <div class="flex-grow">
                <label class="block text-gray-700 text-sm font-bold mb-2">Ingrese su Número de Documento</label>
                <input wire:model="document_number_search" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Ej: 1002345678">
                @error('document_number_search') <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Consultar
            </button>
        </form>
    </div>

    @if ($camper)
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Camper Info & Status -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Información del Campista</h3>
                <div class="space-y-3">
                    <p><strong>Nombre:</strong> {{ $camper->name }}</p>
                    <p><strong>Zona:</strong> {{ $camper->zone }}</p>
                    <p><strong>Congregación:</strong> {{ $camper->congregacion }}</p>
                    <hr class="my-4">
                    <div class="flex justify-between items-center text-lg">
                        <span>Costo Total:</span>
                        <span class="font-bold">$300,000</span>
                    </div>
                    <div class="flex justify-between items-center text-lg text-green-600">
                        <span>Total Abonado (Aprobado):</span>
                        <span class="font-bold">${{ number_format($camper->total_paid, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center text-xl text-red-600 font-bold bg-red-50 p-2 rounded">
                        <span>Saldo Pendiente:</span>
                        <span>${{ number_format($camper->balance, 0) }}</span>
                    </div>
                </div>

                <div class="mt-8">
                    <h4 class="font-bold mb-2">Historial de Pagos</h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2">Fecha</th>
                                    <th class="px-2 py-2">Monto</th>
                                    <th class="px-2 py-2">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($camper->payments()->latest()->get() as $payment)
                                    <tr>
                                        <td class="px-2 py-2">{{ $payment->created_at->format('d/m/Y') }}</td>
                                        <td class="px-2 py-2">${{ number_format($payment->amount, 0) }}</td>
                                        <td class="px-2 py-2">
                                            @if($payment->status == 'approved')
                                                <span class="text-green-600 font-bold">Aprobado</span>
                                            @elseif($payment->status == 'pending')
                                                <span class="text-yellow-600 font-bold">Pendiente</span>
                                            @else
                                                <span class="text-red-600 font-bold">Rechazado</span>
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
            <div class="bg-white shadow-md rounded-lg p-6 border-t-4 border-green-500">
                <h3 class="text-xl font-bold mb-4 text-gray-800">Registrar Nuevo Abono</h3>

                @if ($payment_success)
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">¡Abono Registrado!</strong>
                        <span class="block sm:inline">Tu abono ha sido subido y está pendiente de aprobación.</span>
                    </div>
                @endif

                <form wire:submit="savePayment" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Monto a Abonar ($)</label>
                        <input wire:model="amount" type="number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('amount') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Comprobante de Pago</label>
                        <input wire:model="payment_proof" type="file"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('payment_proof') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="payment_proof" class="text-sm text-blue-500 mt-1">Cargando imagen...
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out mt-4">
                        Subir Abono
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>