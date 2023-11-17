@extends('layout.plantilla')
@section('contenido')
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h4>Ingresar Producto</h4>
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
{!!Form::open(array('url'=>'producto','method'=>'POST','autocomplete'=>'off')
)!!}
{{Form::token()}}
<div class="row">
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control"
placeholder="Digite el producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="tipo">Tipo</label>
<input type="text" name="tipo" id="tipo" class="form-control"
placeholder="Tipo de producto">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="precio">Precio</label>
<input type="number" name="precio" id="precio" class="form-control"
placeholder="Digite el precio">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="stock">Stock</label>
<input type="number" name="stock" id="stock" class="form-control"
placeholder="Stock Actual">
</div>
</div>
<div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
<div class="form-group">
<label for="image_path">Imagen</label>
<input type="text" name="image_path" id="image_path" class="form-control"
placeholder="Imagen">
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
<div class="form-group"> <br>
<button class="btn btn-primary" type="submit"><span
class="glyphicon glyphicon-ok"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><span
class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
<a class="btn btn-info" type="reset" href="{{url('producto')}}">
<span class="glyphicon glyphicon-home"></span> Regresar </a>
</div>
</div>
</div>
{!!Form::close()!!}
@endsection