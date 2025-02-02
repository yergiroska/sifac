<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIFAC')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Sistema Integral de Facturación (SIFAC)</h1>
    </div>
</header>

<main class="container mx-auto py-6">
    @yield('content')
</main>

<footer class="bg-gray-800 text-white py-4 mt-8">
    <div class="container mx-auto text-center">
        <p>&copy; 2025 SIFAC. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>

