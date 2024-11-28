<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;

class CotizacionController extends Controller
{
    public function create(){
        return view('cotizar.create');
    }

    public function store(Request $request){
        $request->validate([
            'cotizacion_nombre' => ['required', 'string', 'max:80'],
            'cotizacion_correo' => ['required', 'string', 'max:50'],
            'cotizacion_telefono' => ['required', 'string', 'max:9'],
            'cotizacion_descripcion' => ['required', 'string', 'max:400'],
        ]);

        Cotizacion::create($request->all());
        return redirect()->route('cotizar.create')->with('success', 'Cotización enviada correctamente');
    }
}
