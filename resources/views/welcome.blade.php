<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campamento Distrital Juvenil 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="max-w-3xl w-full bg-white rounded-lg shadow-2xl overflow-hidden">
        <div class="p-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-900 mb-4">Campamento Distrital Juvenil 2026</h1>
            <p class="text-gray-600 text-lg mb-8">Prepárate para la mejor experiencia del año.</p>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="border rounded-lg p-6 hover:shadow-lg transition bg-blue-50">
                    <h2 class="text-2xl font-bold text-blue-800 mb-2">¡Inscríbete Ya!</h2>
                    <p class="text-gray-600 mb-4">Asegura tu cupo llenando el formulario de registro.</p>
                    <a href="/registro"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                        Ir al formulario
                    </a>
                </div>

                <div class="border rounded-lg p-6 hover:shadow-lg transition bg-green-50">
                    <h2 class="text-2xl font-bold text-green-800 mb-2">Ya estoy inscrito/a</h2>
                    <p class="text-gray-600 mb-4">Sube tus abonos y revisa tu estado de cuenta.</p>
                    <a href="/consulta"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">
                        Consultar Estado
                    </a>
                </div>
            </div>

            <div class="mt-8 text-sm text-gray-500">
                <a href="/admin" class="hover:underline">Acceso Administrativo</a>
            </div>
        </div>
    </div>
</body>

</html>