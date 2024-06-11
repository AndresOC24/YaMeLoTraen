@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrito de Compras</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->title }}</td>
                    <td>${{ $cartItem->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                            <button type="submit" class="btn btn-info">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
