<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    public function index() {
        
        $productos = Producto::all();
        return view('productos.index', compact('producto'));
    }

    public function show(Producto $producto) {
        return view('productos.show', compact('producto'));
    }

    public function agregarCart(Request $request, Producto $producto)  //AGREGAR DATOS AL CARRITO DE COMPRA
    { 
        $cart = Session::get('cart', []); 
        $cart[$producto->id_producto] = [ 
            "name" => $producto->producto_nombre,    
            "quantity" => isset($cart[$producto->id_producto]) ? $cart[$producto->id_producto]['quantity'] + 1 : 1, 
            "price" => $producto->producto_precio_unitario, 
            "image" => $producto->producto_imagen ]; 
            Session::put('cart', $cart); 
            //EL SESION PERMITE ALMACENAR LOS DATOS GUARDADOS EN EL CARRITO EN TODAS LAS PAGINAS HASTA QUE SE CIERRE
            //POR COMPLETO TODO
            return redirect()->route('productos.index'); 
    }

    public function showCart() //MOSTRAR LOS DATOS EN EL CARRITO DE COMPRA 
    { 
        $cart = Session::get('cart', []); 
        $subtotal = array_sum(array_map(function($item) { 
            return $item['quantity'] * $item['price']; 
        }, $cart)); 


        return view('cart.show', compact('cart', 'subtotal')); 
    }

    public function showFullCart()   //PARA LA PAGINA DONDE MUESTRE EL LISTADO DE LOS DATOS DEL CARRITO DE COMPRA
    { 
        $cart = Session::get('cart', []); 
        $subtotal = array_sum(array_map(function($item) { 
            return $item['quantity'] * $item['price']; 
        }, $cart)); 
        $total = $subtotal; // Puedes agregar lógica para calcular impuestos o descuentos si es necesario 
        return view('cart.full', compact('cart', 'subtotal', 'total'));
    }


    public function filtrarPorEspecie($especie) { 
        // Mapeo de nombres a códigos de especie 
        $especies = [ 
            'perro' => 1, 
            'gato' => 2, 
            'conejo' => 3, 
        ]; 
        // Obtener el código de especie correspondiente 
        $codigoEspecie = $especies[$especie] ?? null; 
        if ($codigoEspecie !== null) { 
            $productos = Producto::where('producto_codigo_especie', $codigoEspecie)->get(); 
            return view('productos.index', compact('productos')); 
        } else { 
            // Manejar caso de especie no encontrada 
            return redirect()->route('productos.index')->withErrors(['Especie no encontrada']); 
        }
    }
        // EJEMPLO DE COMO PONER LAS RUTAS EN LAS ANCLAS
    /*
        <nav> 
            <ul> 
                <li><a href="{{ route('productos.index') }}">Todos</a></li> 
                <li><a href="{{ route('productos.filter', 'gato') }}">Gato</a></li> 
                <li><a href="{{ route('productos.filter', 'perro') }}">Perro</a></li> 
                <li><a href="{{ route('productos.filter', 'conejo') }}">Conejo</a></li> 
            </ul> 
        </nav>
    */

    
    //CONTROLLERS DEL DASHBOARD JEJE 

    public function indexDashboard() {
        $producto = Producto::all();

        return view('dashboard.producto.index', compact('producto'));
    }

    public function create() {
        return view('dashboard.producto.create');
    }

    public function store(Request $request) {
        Producto::create($request->all());

        return redirect()->route('dashboard.producto.index')->with('producto creado correctamente');
    }

    public function edit(string $id) {
        $producto = Producto::findOrFail($id);

        return view('dashboard.producto.edit', compact('producto'));
    }

    public function update(Request $request, string $id) {
        $producto = Producto::findOrFail($id);
        $producto->update([
            'producto_nombre' => $request->input('nombre'),
            'producto_descripcion' => $request->input('descripcion'),
            'producto_imagen' => $request->input('imagen'),
            'producto_precio_unitario' => $request->input('precio_unitario'),
            'producto_codigo_especie' => $request->input('especie'),
            'producto_codigo_marca' => $request->input('marca'),
            'producto_codigo_categoria' => $request->input('categoria'),
        ]);

        return redirect()->route('dashboard.producto.index')->with('producto actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('dashboard.producto.index')->with('producto eliminado correctamente');
    }

}