@extends('layout.plantilla2')

@section('contenido2')
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($pedido as $pedi)
                        <tr>
                            <td>{{ $pedi->id }}</td>
                            <td>
                                {{-- Decodificar la descripción del pedido --}}
                                @php
                                    $descripcion = json_decode($pedi->descripcion, true);
                                @endphp

                                {{-- Verificar si la descripción es un array --}}
                                @if (is_array($descripcion))
                                    {{-- Mostrar la descripción --}}
                                    <ul>
                                        @foreach($descripcion as $producto)
                                            <li>{{ $producto['descripcion'] }}</li>
                                            <!-- Puedes mostrar otras propiedades según tus necesidades -->
                                        @endforeach
                                    </ul>
                                @else
                                    {{-- Mostrar un mensaje de error o manejar de otra manera --}}
                                    Descripción no válida
                                @endif
                            </td>
                            <td>{{ $pedi->total }}</td>
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
