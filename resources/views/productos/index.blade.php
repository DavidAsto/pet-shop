<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--EJEMPLO DE COMO PUEDES USAR LOS DATOS PARA DESPLEGAR LOS CARDS DE PRODUCTOS Y EL CARRITO DE COMPRAS-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!--ESTO SOLO ES UN EJEMPLO-->
                                 <!-- EN LA CARPETA CART ESTA LA VISTA DE @include('cart.show')-->
    <h1>Lista de Productos</h1> 
    <div class="container"> 
        <div class="row"> 
            @foreach($productos as $producto) 
            <div class="col-md-4"> 
                <div class="card mb-4 shadow-sm"> 
                    <img src="{{ $producto->producto_imagen }}" class="card-img-top" alt="Imagen de {{ $producto->producto_nombre }}"> 
                    <div class="card-body"> 
                        <h5 class="card-title">{{ $producto->producto_nombre }}</h5> 
                        <p class="card-text">{{ $producto->producto_descripcion }}</p> 
                        <p class="card-text">${{ $producto->producto_precio_unitario }}</p> 
                        <form action="{{ route('cart.add', $producto) }}" method="POST"> 
                            @csrf 
                            <button type="submit" class="btn btn-success">Agregar al carrito</button> 
                        </form> 
                    </div> 
                </div> 
            </div> 
            @endforeach 
        </div> 
        <div class="cart-icon"> 
            <a href="#" onclick="toggleCart()"> 
                <img src="/path/to/cart-icon.png" alt="Carrito"> 
            </a> 
        </div> 
        <div id="cart" style="display: none;"> 
            @include('cart.show') 
        </div> 
    </div>
</body>
</html>