<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg" x-data="{ open: false }">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <div class="text-lg font-bold"><img src="{{ asset('/IMG/Logotipo.png') }}" alt="Bootstrap" width="50" height="40" style="border-radius: 10px;"></div>
            <div class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-700">Inicio</a>
                <a href="#" class="text-gray-700">Mi Cuenta</a>
                <a href="#" class="text-gray-700">Promociones</a>
                <a href="#" class="text-gray-700">Mi Camión</a>
                <a href="{{ route('signout') }}" class="text-gray-700">Cerrar Sesión</a>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="md:hidden" x-show="open" @click.away="open = false">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block text-gray-700">Inicio</a>
                <a href="#" class="block text-gray-700">Mi Cuenta</a>
                <a href="#" class="block text-gray-700">Promociones</a>
                <a href="#" class="block text-gray-700">Mi Camión</a>
                <a href="{{ route('signout') }}" class="text-gray-700">Cerrar Sesión</a>

            </div>
        </div>
    </nav>
    <!-- Empresas Grid -->
    <div class="container mx-auto py-2">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-2">
            <!-- Empresa 1 -->
            <div class="bg-red-750 p-6 rounded-lg shadow-lg flex flex-col items-center">
                <img class="h-40 object-cover mb-4" src="{{ asset('IMG/CocaCola.png') }}" alt="Coca Cola">
                <h3 class="text-xl font-bold mb-2">Coca Cola</h3>
                <div class="mt-4">
                    <a href="#" class="text-blue-500">Ver más...</a>
                </div>
            </div>
            <!-- Empresa 2 -->
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img class="h-40 object-cover mb-4" src="{{ asset('IMG/delizia.png') }}" alt="Delizia">
            <h3 class="text-xl font-bold mb-2">Delizia</h3>
            <div class="mt-4">
            <a href="#" class="text-blue-500">Ver más...</a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img class="h-40 object-cover mb-4" src="{{ asset('IMG/pil.png') }}" alt="Pil">
            <h3 class="text-xl font-bold mb-2">Pil</h3>
            <div class="mt-4">
            <a href="#" class="text-blue-500">Ver más...</a>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img class="h-40 object-cover mb-4" src="{{ asset('IMG/sofia.png') }}" alt="Sofia">
            <h3 class="text-xl font-bold mb-2">Sofia</h3>
            <div class="mt-4">
            <a href="#" class="text-blue-500">Ver más...</a>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img class="h-40 object-cover mb-4" src="{{ asset('IMG/scottlogo.png') }}" alt="Scoot">
            <h3 class="text-xl font-bold mb-2">Scott</h3>
            <div class="mt-4">
            <a href="#" class="text-blue-500">Ver más...</a>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
        <img class="h-40 object-cover mb-4" src="{{ asset('IMG/mabels.png') }}" alt="Mabels">
            <h3 class="text-xl font-bold mb-2">Mabel's</h3>
            <div class="mt-4">
            <a href="#" class="text-blue-500">Ver más...</a>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center footer-icons">

                <a href="dashboard.html" class="text-body-secondary text-decoration-none lh-1" style="margin-right: 50px;; margin-left: 20px;">
                    <i class="bi bi-house-door" style="font-size: 30px;"></i> <!-- Icono de la casa -->
                </a>
                <a href="Micuenta.html" class="text-body-secondary text-decoration-none lh-1" style="margin-right: 70px;">
                    <i class="bi bi-person" style="font-size: 30px;"></i> <!-- Icono de la persona -->
                </a>
                <a href="Promociones.html" class="text-body-secondary text-decoration-none lh-1" style="margin-right: 55px;">
                    <i class="bi bi-gift" style="font-size: 30px;"></i> <!-- Icono del regalo -->
                </a>
                <a href="Camion.html" class="text-body-secondary text-decoration-none lh-1" style="margin-right: 0px; margin-left: 10px;">
                    <i class="bi bi-truck" style="font-size: 30px;"></i> <!-- Icono de la camión -->
                </a>
            </div>
        </footer>
    </div>

</body>

</html>
