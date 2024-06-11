@extends('layouts.app')

@section('content')
<style>
    /* Estilo para las imágenes */
    .card-img-top {
        max-width: 100px; /* Ancho máximo de la imagen */
        height: auto; /* Altura automática */
    }
    /* Estilo para los botones */
    .btn-primary {
        background-color: #ff9800;
        border-color: #ff9800;
    }
    .btn-primary:hover {
        background-color: #e68900;
        border-color: #e68900;
    }
    /* Estilo para el encabezado y la fecha */
    h1.text-start, h1.text-start i {
        color: #ff9800;
    }
    /* Estilo para el grupo de botones de cantidad */
    .quantity-group {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }
    .quantity-group input {
        max-width: 60px;
        text-align: center;
    }
</style>
<div class="container">
    <!-- Encabezado con la fecha y el título "Productos" -->
    <div class="row">
        <div class="col">
            <a href="/dashboard" class="text-decoration-none">
                <h1 class="text-start"><i class="bi bi-arrow-left-circle-fill"></i> Productos</h1>
            </a>
        </div>
    </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="row g-0">
                        <!-- Imagen del producto -->
                        <div class="col-md-4">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!-- Nombre del producto -->
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <!-- Precio del producto -->
                                <h2 class="card-text">Bs. {{ $product->price }}</h2>
                                <!-- Grupo de cantidad -->
                                <div class="quantity-group">
                                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity(this)">-</button>
                                    <input type="number" class="form-control" name="quantity" value="1" min="1" onchange="calculateTotal(this)">
                                    <button class="btn btn-outline-secondary" onclick="increaseQuantity(this)">+</button>
                                </div>
                                <h3 class="text-end subtotal">Bs. {{ $product->price }}</h3> <!-- Subtotal inicial -->
                                <!-- Formulario para añadir al carrito -->
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript para calcular subtotal y total -->
<script>
    function increaseQuantity(button) {
        var input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
        calculateTotal(button);
    }

    function decreaseQuantity(button) {
        var input = button.nextElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            calculateTotal(button);
        }
    }

    function calculateTotal(button) {
        var card = button.closest('.card');
        var price = parseFloat(card.querySelector('.card-text').textContent.replace('Bs. ', ''));
        var quantity = parseInt(card.querySelector('input[type="number"]').value);
        var subtotal = price * quantity;
        card.querySelector('.subtotal').textContent = 'Bs. ' + subtotal.toFixed(2);
        card.querySelector('input[name="quantity"]').value = quantity;
    }
</script>
@endsection
