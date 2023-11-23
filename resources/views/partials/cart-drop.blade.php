@if(count(\Cart::getContent()) > 0)
@foreach(\Cart::getContent() as $item)
<li class="list-group-item">
    <div class="row">
        <div class="col-lg-3">
            <img src="{{ asset('img/'.$item->attributes->image_path) }}" style="width: 50px; height: 50px;">
        </div>
        <div class="col-lg-6">
            <b>{{$item->name}}</b>
            <br><small>Cantidad: {{$item->quantity}}</small>
        </div>
        <div class="col-lg-3">
            <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
        </div>
        <hr>
    </div>
</li>
@endforeach
<br>
<li class="list-group-item">
    <div class="row">
        <div class="col-lg-10">
            <b>Total: </b>${{ \Cart::getTotal() }}
        </div>
        <div class="col-lg-2">
            <form action="{{ route('cart.clear') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                        </path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></button>
            </form>
        </div>
    </div>
</li>
<br>
<div class="row" style="margin: 0px;">
    <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
        CARRITO <i class="fa fa-arrow-right"></i>
    </a>
    <a class="btn btn-dark btn-sm btn-block" href="{{ url('checkout') }}">
        ENVIAR <i class="fa fa-arrow-right"></i>
    </a>
</div>
@else
<li class="list-group-item">Tu carrito esta vacío</li>
@endif