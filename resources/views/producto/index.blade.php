@extends('layout.plantilla')

@section('contenido')
<div class="row">
<div class="col-md-9">
<a href="{{url('producto/create')}}" class="pull-right">
<button class="btn btn-success">Crear Producto</button> </a>
</div></div>
<div class="row">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<th>Id</th>
<th>Nombre</th>
<th>Tipo</th>
<th>Precio</th>
<th>Stock</th>
<th>Opciones</th>
</thead>
<tbody>
@foreach($producto as $prod)
<tr>
<td>{{ $prod->id }}</td>
<td>{{ $prod->nombre }}</td>
<td>{{ $prod->tipo }}</td>
<td>{{ $prod->precio}}</td>
<td>{{ $prod->stock }}</td>
<td>

<a href="{{URL::action('App\Http\Controllers\ProductoController@edit',$prod->id)}}">
<button class="btn btn-primary">Editar</button></a>

<a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$prod->id}}">
<button type="button" class="btn btn-danger"> Eliminar</button>
</a>
</td>
</tr>
@include('producto.modal')
@endforeach
</tbody> </table>
</div></div>
@endsection