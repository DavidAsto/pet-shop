<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function create(){
        return view('contacto.create');
    }

    public function store(Request $request){
        $request->validate([
            'contacto_nombre' => ['required', 'string', 'max:80'],
            
            'contacto_correo' => ['required', 'string', 'email:rfc,dns', 'max:60'],
            'contacto_telefono' => ['required', 'string', 'max:9'],
            'contacto_mensaje' => ['required', 'string', 'max:500'],
        ]);

        Contacto::create($request->all());

        return redirect()->route('contacto.create')->with('success', 'El mensaje ha sido enviado correctamente');
    }
}
