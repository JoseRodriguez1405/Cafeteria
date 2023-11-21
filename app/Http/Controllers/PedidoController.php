<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Redirect;

class PedidoController extends Controller
{
    

     public function __construct()
     {
     $this->middleware('auth');
     }


    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $pedido=Pedido::orderBy('id','DESC')->paginate(10);
        return view('pedido.pedido',compact('pedido'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido=new Pedido;
        $pedido->nombre=$request->get('nombre');
        $pedido->tipo=$request->get('tipo');
        $pedido->cantidad=$request->get('cantidad');
        $pedido->precio=$request->get('precio');
        $pedido->subtotal=$request->get('subtotal');
        $pedido->save();

        return Redirect::to('pedido');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->delete();
        return Redirect::to('pedido');
    }
}
