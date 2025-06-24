{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <div class="container mx-auto py-4 px-6">
            <h1 class="text-xl font-semibold">{{ config('app.name') }}</h1>
        </div>
    </header>

    <main class="container mx-auto py-8 px-6">
        {{ $slot }}
    </main>

    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto py-4 px-6 text-center">
            © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>
