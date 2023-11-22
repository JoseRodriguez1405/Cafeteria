<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
class CartController extends Controller
{

    public function checkout(Request $request)
    {
        // Verifica si hay productos en el carrito
        if (\Cart::isEmpty()) {
            return abort(404);
        }

        // Recopila los detalles del pedido
        $pedidoDetalles = [];
        $totalPedido = 0;

        foreach (\Cart::getContent() as $item) {
            $pedidoDetalles[] = [
                'descripcion' => $item->name,
                'precio' => $item->price,
                'cantidad' => $item->quantity,
                // Puedes agregar otras columnas según sea necesario
            ];

            // Calcula el subtotal del producto
            $subtotal = $item->quantity * $item->price;
            $totalPedido += $subtotal;
        }

        // Guarda los detalles del pedido en la tabla de pedidos
        $pedido = new Pedido();
        $pedido->descripcion = json_encode($pedidoDetalles); // Puedes ajustar esto según tus necesidades
        $pedido->total = $totalPedido;
        $pedido->save();

        // Limpia el carrito después de realizar el pedido
        \Cart::clear();


        Session::flash('success_msg', 'Pedido creado con éxito');

        // Redirige a una página de agradecimiento u otro lugar
        return redirect()->route('shop');
    }


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
        return redirect()->route('cart.index')->with('success_msg', 'Producto Removido!');
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
