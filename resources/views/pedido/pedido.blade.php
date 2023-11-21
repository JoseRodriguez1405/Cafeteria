@extends('layout.plantilla2')

@section('contenido2')
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($pedido as $pedi)
                        <tr>
                            <td>{{ $pedi->id }}</td>
                            <td>{{ $pedi->nombre }}</td>
                            <td>{{ $pedi->tipo }}</td>
                            <td>{{ $pedi->cantidad}}</td>
                            <td>{{ $pedi->precio }}</td>
                            <td>{{ $pedi->subtotal }}</td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$pedi->id}}">
                                    <button type="button" class="btn btn-danger">Estado</button>
                                </a>
                            </td>
                        </tr>
                        @include('pedido.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection