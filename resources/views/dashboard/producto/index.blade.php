<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script> 
        function confirmDeletion(event) { 
            event.preventDefault(); // Prevenir el envío del formulario 
            var confirmation = confirm("¿Estás seguro de que deseas eliminar este producto?"); 
            if (confirmation) {
                 event.target.submit(); // Si se confirma, enviar el formulario 
                } 
            }
    </script>       
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <a href="{{ route('dashboard.producto.create') }}" class="btn btn-primary">Crear Producto</a>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    
                    <th>Precio Unitario</th>
                    <th>Especie</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producto as $productos)
                    <tr>
                        <td>{{ $productos->producto_nombre }}</td>
                        <td>{{ $productos->producto_descripcion }}</td>
                        <td>{{ $productos->producto_precio_unitario }}</td>
                        <td>{{ $productos->codigo_especie }}</td>
                        <td>{{ $productos->codigo_marca }}</td>
                        <td>{{ $productos->codigo_categoria }}</td>
                        <td>
                            <a href="{{ route('dashboard.producto.edit', $productos->id_producto) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('dashboard.producto.destroy', $productos->id_producto) }}" method="POST" style="display:inline-block;" onsubmit="confirmDeletion(event);">
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

</body>
</html>