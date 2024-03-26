<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::paginate(15);
        return Inertia::render('Productos/Productos', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto' => 'required',
            'descripcion' => 'required',
            'categoria'=> 'required',
            'stock' => 'required',
            'precioUni' => 'required'
        ]);

        try {
            $productos = new Product;
            $productos->producto = $request->producto;
            $productos->descripcion = $request->descripcion;
            $productos->categoria = $request->categoria;
            $productos->stock = $request->stock;
            $productos->precioUni = $request->precioUni;
            $productos->status = $request->status;
            $productos->user_id = auth()->user()->id;

            $productos->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $validated = $request->validate([
        //     'productos' => 'required',
        //     'descripcion' => 'required',
        //     'categoria'=> 'required',
        //     'stock' => 'required',
        //     'precioUni' => 'required',
        //     'status' => 'required',
        // ]);

        try {
            $productos = Product::find($request->id);
            $productos->producto = $request->producto;
            $productos->descripcion = $request->descripcion;
            $productos->categoria = $request->categoria;
            $productos->stock = $request->stock;
            $productos->precioUni = $request->precioUni;

            $productos->status = $request->status ? 1:0;

            $productos->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $producto = Product::find($id);
            $producto->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return to_route('productos.index');
    }
}
