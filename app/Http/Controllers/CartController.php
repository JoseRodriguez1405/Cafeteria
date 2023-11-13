<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{

    public function shop()
    {
        $products = Producto::all();
        //dd($products);
        return view('tienda.cofy')->withTitle('E-COMMERCE STORE | SHOP')->with(['producto' => $producto]);
    }
    public function add(Request $request)
    {

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->nombre,
            'price' => $request->precio,
            'costo_envio' => $request->costo_envio,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));


        return redirect()->route('cart.index')->with('success_msg', 'Item
Agregado a sú Carrito!');
    }
    public function cart()
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('tienda.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
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
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'Carrito
Actualizado!');
    }
    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito esta
vacio!');
    }
}
