<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
    <h1>Carrito de Compras</h1> 
    <ul> 
        @foreach($cart as $item) 
        <li> 
            <img src="{{ $item['image'] }}" alt="Imagen de {{ $item['name'] }}" width="50"> 
            {{ $item['name'] }} - Cantidad: {{ $item['quantity'] }} - Precio: ${{ $item['price'] }} 
        </li> 
        @endforeach 
    </ul> 
    <h3>Subtotal: ${{ $subtotal }}</h3> 
    <a href="{{ route('cart.showFull') }}">Ver Carrito</a>
</body>
</html>