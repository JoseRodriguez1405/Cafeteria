@extends('layout.plantilla')
@section ('contenido')
<div class="row">
 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 <h4>Editar Producto</h4>
 @if (count($errors)>0)
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{$error}}</li>
 @endforeach
 </ul>
 </div>
 @endif
 </div>
</div>
{{Form::open(array('action'=>array('App\Http\Controllers\ProductoController@update', $producto->id),'method'=>'patch'))}}
<div class="row g-3">
 <div class="col-md-4">
 <label for="nombre" class="form-label">Nombre</label>
 <input type="text" name="nombre" id="nombre"
class="form-control"
 value="{{$producto->nombre}}">
 </div>
 <div class="col-md-4">
 <label for="tipo" class="form-label">Tipo</label>
 <input type="text" name="tipo" id="tipo" class="form-control"
value="{{$producto->tipo}}">
 </div>
 <div class="col-4">
 <label for="precio" class="form-label">Precio</label>
 <input type="number" name="precio" id="precio" class="form-control"
value="{{$producto->precio}}">
 </div>
 <div class="col-6">
 <label for="stock" class="form-label">Stock</label>
 <input type="number" name="stock" id="stock" class="form-control"
value="{{$producto->stock}}">
 </div>

 <div class="col-12">
 <button class="btn btn-primary" type="submit"><span class="glyphicon glyphiconrefresh"></span> Actualizar
 </button>
<a class="btn btn-info" type="reset" href="{{url('producto')}}">
 <span class="glyphicon glyphicon-home"></span> Regresar </a>
 </div>
 </div>
{!!Form::close()!!}
@endsection