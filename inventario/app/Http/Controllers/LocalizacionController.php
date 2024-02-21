<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;
use App\Models\Producto;

class LocalizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localizaciones = Localizacion::all();

        return view('localizaciones', ['localizaciones' => $localizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $localizacion = new Localizacion();
        $localizacion->ciudad = $request->ciudad;
        $localizacion->nombre_edificio = $request->nombre_edificio;
        $localizacion->direccion = $request->direccion;
        $localizacion->numero_sala = $request->numero_sala;
        $localizacion->save();
        
        $ultimaLocalizacion = Localizacion::latest()->first();

        // Se verifica si se obtuvo una localización
        if ($ultimaLocalizacion) {
           
            $producto = Producto::find(intval($request->id_producto));
            
            $producto->update(['localizacion_id' => $ultimaLocalizacion->id]);

            return redirect()->route('dashboard.formUpdateProduct', ['producto' => $producto]);
        } else {
            //si no hubiera ninguna localización se redireccionará al inicio
            return redirect()->route('dashboard');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Localizacion $localizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localizacion $localizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Localizacion $localizacion)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Localizacion::destroy($id);
        return redirect()->route('localizaciones');
    }
}