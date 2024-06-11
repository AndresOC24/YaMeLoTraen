@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrito de Compras</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
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
                @php
                    $totalPrice = 0; // Inicializa la variable para almacenar el precio total
                @endphp
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->title }}</td>
                        <td>Bs.{{ $cartItem->product->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST" class="d-flex flex-column flex-md-row">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" class="form-control mb-2 mb-md-0" value="{{ $cartItem->quantity }}" min="1">
                                <button type="submit" class="btn btn-info ms-md-2">Actualizar</button>
                            </form>
                        </td>
                        <td>Bs.{{ $cartItem->product->price * $cartItem->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalPrice += $cartItem->product->price * $cartItem->quantity; // Suma el precio total del producto al total
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td>Total: Bs.{{ $totalPrice }}</td> <!-- Muestra el precio total -->
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
