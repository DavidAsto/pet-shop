<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CotizacionController;

//RUTAS DE PRODUCTOS
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');//LISTA TODOS LOS PRODUCTOS
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');//MOSTRAR PRODUCTO INDIVIDUALMENTE
Route::get('/productos/filtrar/{especie}', [ProductoController::class, 'filtrarPorEspecie'])->name('productos.filtrar');//FILTRAR PRODUCTOS POR ESPECIE, DE ACUERDO AL BOTON QUE PRESIONES

//RUTAS PRODUCTO DASHBOARD

Route::prefix('dashboard/producto')->group(function () { 
    Route::get('/', [ProductoController::class, 'indexDashboard'])->name('dashboard.producto.index'); 
    Route::get('/create', [ProductoController::class, 'create'])->name('dashboard.producto.create'); 
    Route::post('/', [ProductoController::class, 'store'])->name('dashboard.producto.store'); 
    Route::get('/{id}/edit', [ProductoController::class, 'edit'])->name('dashboard.producto.edit'); 
    Route::put('/{id}', [ProductoController::class, 'update'])->name('dashboard.producto.update'); 
    Route::delete('/{id}', [ProductoController::class, 'destroy'])->name('dashboard.producto.destroy');
});

//RUTAS DEL CARRITO DE COMPRAS
Route::post('cart/add/{product}', [ProductoController::class, 'agregarCart'])->name('cart.add'); //AGREGA LOS DATOS AL CARRITO
Route::get('cart', [ProductoController::class, 'showCart'])->name('cart.show'); //MUESTRA LOS DATOS EN EL CARRITO
Route::get('/cart/full', [ProductoController::class, 'showFullCart'])->name('cart.showFull'); //PARA IR A UNA PAGINA DONDE ESTAN LOS DATOS DE EL CARRITO
                                                                                          //LISTADOS Y EL SUBTOTAL Y TOTAL

//RUTAS PARA CONTACTO
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');     
Route::get('/contacto', [ContactoController::class, 'create'])->name('contacto.create');    

//RUTA PARA COTIZACION
Route::post('/cotizar', [CotizacionController::class,'store'])->name('cotizar.store');     
Route::get('/cotizar', [CotizacionController::class, 'create'])->name('cotizar.create');
                                                        