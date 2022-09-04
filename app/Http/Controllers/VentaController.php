<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $producto, Venta $venta)
    {
        $request->validate([
            'id' => 'required',
            'cantidad' => 'required',
        ]);
        
        $count_produto = Producto::where('id', $request->id)->first();
        $count_venta = Venta::where('producto_id', $request->id)->count();

        // dd($count_venta);
        
        if ($count_produto->stock <= 0) {
            return redirect()->route('productos.index')->with('success','No es posible realizar la venta.');
        }
        elseif ($count_venta == 0) {
            //Registro tabla ventas
            Venta::create([
                'producto_id' => $request->id,
                'cantidad' => $request->cantidad,
            ]);
        }else{
            // Suma stock ventas
            $id_ventas = Venta::where('producto_id', $request->id)->first();
            $venta = Venta::find($id_ventas->producto_id);
            $suma_ventas = $id_ventas->cantidad + $request->cantidad;
            $venta->cantidad = $suma_ventas;
            $venta->save();

            // Resta del stock productos
            $id_producto = Producto::where('id', $request->id)->first();   
            $producto = Producto::find($id_producto->id);
            $resta_stock = $id_producto->stock - $request->cantidad;
            $producto->stock = $resta_stock;
            $producto->save();
        }

        return redirect()->route('productos.index')->with('success','Producto vendido correctamente.');
    }
}
