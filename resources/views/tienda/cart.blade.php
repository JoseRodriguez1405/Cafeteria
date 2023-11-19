@extends('layout.app')
@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Tienda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
    @if(session()->has('success_msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success_msg') }}
        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if(session()->has('alert_msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('alert_msg') }}
        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if(count($errors) > 0)
    @foreach($errors0>all() as $error)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endforeach
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <br>
            @if(\Cart::getTotalQuantity()>0)
            <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el
                carrito</h4><br>
            @else
            <h4>No hay Producto(s) en su carrito</h4><br>
            <a href="{{ url('cofy') }}" class="btn btn-dark">Continue en la tienda</a>
            @endif
            @foreach($cartCollection as $item)
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ asset('img/'.$item->attributes->image_path) }}" class="img-thumbnail" width="200"
                        height="200">
                </div>
                <div class="col-lg-5">
                    <p>
                        <b><a href="/cofy/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                        <b>Precio: </b>${{ $item->price }}<br>
                        <b>Sub Total: </b>${{ \Cart::getTotal() }}<br>
                        {{-- <b>With Discounts: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="row ">
                        <form action="{{ route('cart.update') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row ">
                                <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                    id="cantidad" name="cantidad" style="width: 70px; margin-right: 10px;">
                                <button class="btn btn-success btn-sm" style="margin-right: 25px;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-loader">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>&nbsp;Actualizar</button>
                            </div>
                        </form>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                            <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i
                                    class="fa fa-trash"></i><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>&nbsp; Eliminar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            @if(count($cartCollection)>0)
            <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-secondary btn-md">Borrar
                    Carrito</button>
            </form>
            @endif
        </div>
        @if(count($cartCollection)>0)
        <div class="col-lg-5">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() + $item->costo_envio }} </li>
                </ul>
            </div>
            <br><a href="{{ url('cofy') }}" class="btn btn-dark">Continue en la
                tienda</a>
            <a href="/checkout" class="btn btn-success">Proceder al
                Checkout</a>
        </div>
        @endif
    </div>
    <br><br>
</div>
@endsection