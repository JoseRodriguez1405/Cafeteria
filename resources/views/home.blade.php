@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INICIO') }}</div>

                <div class="row">
           <div class="col-md-9">
<a href="{{url('producto')}}" class="pull-right">
<button class="btn btn-secondary">Administrator</button> </a>
</div></div>
<br>
<div class="row">
<div class="col-md-9">
<a href="{{url('cofy')}}" class="pull-right">
<button class="btn btn-secondary">Pagina Web</button> </a>
</div></div>
            </div>
        </div>
    </div>
</div>
@endsection
