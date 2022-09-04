<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'nombre' => 'required',
        //     'cantidad' => 'required',
        // ]);

        Producto::create([
            'nombre' => $request->nombre,
            'referencia' => $request->referencia,
            'precio' => $request->precio,
            'peso' => $request->peso,
            'categoria' => $request->categoria,
            'stock' => $request->stock,
            'fecha' => $request->fecha,
            // 'categoria' => $categoria_id->id,
        ]);
     
        return redirect()->route('productos.index')->with('success','Producto creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {

        // $request->validate([
        //     'nombre' => 'required',
        //     'cantidad' => 'required',
        // ]);
        
        $producto->update($request->all());
    
        return redirect()->route('productos.index')->with('success','Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    
        return redirect()->route('productos.index')->with('success','Producto eliminado correctamente');
    }
}
