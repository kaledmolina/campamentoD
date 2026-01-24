<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-900">Inscripciones Campamento Distrital Juvenil 2026</h2>

    @if ($registration_success)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Registro Exitoso!</strong>
            <span class="block sm:inline">Tu inscripción ha sido recibida y está pendiente de aprobación. Puedes consultar
                tu estado con tu número de documento.</span>
        </div>
    @endif

    <form wire:submit="save" class="space-y-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Nombres y Apellidos *</label>
            <input wire:model="name" type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico *</label>
            <input wire:model="email" type="email"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Tipo de documento *</label>
                <select wire:model="document_type"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione...</option>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Otro">Otro</option>
                </select>
                @error('document_type') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Número de documento *</label>
                <input wire:model="document_number" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('document_number') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Zona *</label>
                <input wire:model="zone" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('zone') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Congregación *</label>
                <input wire:model="congregacion" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('congregacion') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Celular *</label>
                <input wire:model="phone" type="tel"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('phone') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Edad *</label>
                <input wire:model="age" type="number"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('age') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Comprobante de Pago (10% Inscripción $30.000)
                *</label>
            <input wire:model="payment_proof" type="file"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('payment_proof') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            <div wire:loading wire:target="payment_proof" class="text-sm text-blue-500 mt-1">Cargando imagen...</div>
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                Enviar Inscripción
            </button>
        </div>
    </form>
</div>