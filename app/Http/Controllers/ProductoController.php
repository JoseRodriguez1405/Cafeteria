<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
     $this->middleware('auth');
     }


    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $producto=Producto::orderBy('id','DESC')->paginate(10);
        return view('producto.index',compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productos=new Producto;
        $productos->nombre=$request->get('nombre');
        $productos->tipo=$request->get('tipo');
        $productos->precio=$request->get('precio');
        $productos->stock=$request->get('stock');
        $productos->image_path=$request->get('image_path');
        $productos->save();

        return Redirect::to('producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto=Producto::findOrFail($id);
        return view("producto.edit",["producto"=>$producto]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productos=Producto::findOrFail($id);
        $productos->nombre=$request->get('nombre');
        $productos->tipo=$request->get('tipo');
        $productos->precio=$request->get('precio');
        $productos->stock=$request->get('stock');
        $productos->image_path=$request->get('image_path');
        $productos->update();
        return Redirect::to('producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productos=Producto::findOrFail($id);
        $productos->delete();
        return Redirect::to('producto');
    }
}
