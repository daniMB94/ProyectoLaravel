<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $productos = Producto::with(['categoria', 'localizacion'])->paginate(8);

        return view('dashboard', compact('productos'));
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
        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->modelo = $request->modelo;
        $producto->fabricante = $request->fabricante;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $request->imagen;
        $producto->stock = $request->stock;
        $producto->estado = $request->estado;
        $producto->save();

        return redirect()->route('dashboard');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto.formUpdateProduct', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $page)
    {
        Producto::destroy($id);
        return redirect('admin/dashboard?page='.$page);
    }

    public function filtrar(Request $request)
    {
        $filtro = $request->filtro;
        $productos = Producto::with(['categoria', 'localizacion'])
        ->where('modelo', 'like', '%' . $filtro . '%')
        ->orWhere('codigo', 'like', '%' . $filtro . '%')
        ->orWhereHas('categoria', function ($query) use ($filtro) {
            $query->where('nombre', 'like', '%' . $filtro . '%');
        })
        ->paginate(8);

        return view('dashboard', ['productos' => $productos]);
    }
}