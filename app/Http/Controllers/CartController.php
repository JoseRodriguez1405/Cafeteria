<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{

    public function shop()
    {
        $productos = Producto::all();
        //dd($products);

        return view('tienda.cofy')->withTitle('CAFETERIA')->with(['producto' => $productos]);
        //return view('tienda.cofy',compact('productos'));
    }
    public function add(Request $request)
    {

        //dd(request());

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->nombre,
            'type' => $request->tipo,
            'price' => $request->precio,
            'quantity' => $request->cantidad,
            'attributes' => array(
                'image_path' => $request->image_path,
            ),
        ));


        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }
    public function cart()
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('tienda.cart')->withTitle('CAFETERIA')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'ProductoRemovido!');
    }

    public function update(Request $request)
    {
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->cantidad
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }
    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito esta vacio!');
    }
}
