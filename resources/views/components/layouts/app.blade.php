<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Campamento Distrital 2026' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-blue-900 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-xl font-bold">Campamento 2026</a>
            <div>
                <a href="/registro" class="text-blue-200 hover:text-white px-3 py-2 rounded">Inscripciones</a>
                <a href="/consulta" class="text-blue-200 hover:text-white px-3 py-2 rounded">Consulta / Pagos</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        <p>&copy; 2026 Campamento Distrital Juvenil. Todos los derechos reservados.</p>
    </footer>
</body>

</html>