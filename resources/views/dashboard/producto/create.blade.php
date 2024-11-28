<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h1>Crear Producto</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dashboard.producto.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="producto_nombre">Nombre</label>
                <input type="text" class="form-control" id="producto_nombre" name="producto_nombre" required>
            </div>
            <div class="form-group">
                <label for="producto_descripcion">Descripción</label>
                <textarea class="form-control" id="producto_descripcion" name="producto_descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="producto_imagen">Imagen</label>
                <input type="text" class="form-control" id="producto_imagen" name="producto_imagen" required>
            </div>
            <div class="form-group">
                <label for="producto_precio_unitario">Precio Unitario</label>
                <input type="number" step="0.01" class="form-control" id="producto_precio_unitario" name="producto_precio_unitario" required>
            </div>
            <div class="form-group">
                <label for="producto_codigo_especie">Código de Especie</label>
                <input type="number" class="form-control" id="codigo_especie" name="codigo_especie" required>
            </div>
            <div class="form-group">
                <label for="producto_codigo_marca">Código de Marca</label>
                <input type="number" class="form-control" id="codigo_marca" name="codigo_marca" required>
            </div>
            <div class="form-group">
                <label for="producto_codigo_categoria">Código de Categoría</label>
                <input type="number" class="form-control" id="codigo_categoria" name="codigo_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('dashboard.producto.index') }}">Volver</a>
        </form>
    </div>

</body>
</html>