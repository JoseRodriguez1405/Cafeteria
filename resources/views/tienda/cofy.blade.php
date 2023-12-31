@extends('layout.app')
@section('content')

<div class="container" style="margin-top: 80px">
    <!-- En tu vista cart.index.blade.php -->

@if(Session::has('success_msg'))
<div class="alert alert-success">
    {{ Session::get('success_msg') }}
</div>
@endif

<!-- Resto del contenido de la página -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item active" ariacurrent="page">Tienda</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">


                <div class="col-lg-7">
                    <h4>Productos</h4>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach($producto as $pro)
                <div class="col-lg-3">
                    <div class="card" style="margin-bottom: 20px; height:auto;">
                        <img src="/img/{{ $pro->image_path }}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display:block;" alt="{{ $pro->image_path }}">
                        <div class="card-body">
                            <a href="">
                                <h6 class="card-title">{{ $pro->nombre }}</h6>
                            </a>
                            <p>${{ $pro->precio }}</p>
                            <form action="{{ route('cart.store') }}" method="POST"> 
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $pro->id}}" id="id" name="id">
                                <input type="hidden" value="{{ $pro->nombre }}" id="nombre" name="nombre">
                                <input type="hidden" value="{{ $pro->tipo }}" id="tipo" name="tipo">
                                <input type="hidden" value="{{ $pro->precio }}" id="precio" name="precio">
                                <input type="hidden" value="{{ $pro->image_path }}" id="image_path" name="image_path">
                                
                                <input type="hidden" value="1" id="cantidad" name="cantidad">
                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        <button class="btn btn-info" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shoppingcart"></i> Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection