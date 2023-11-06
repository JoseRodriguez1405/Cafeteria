<div class="modal fade" id="modal-delete-{{$prod->id}}" tabindex="-1" arialabelledby="ModalLabel" aria-hidden="true">
{{Form::Open(array('action'=>array('App\Http\Controllers\ProductoController@destroy',$prod->id),'method'=>'delete'))}}
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
 <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
 </div>
 <div class="modal-body">
 <p>Desea Eliminar el Producto</p>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Cerrar</button>
 <button type="submit" class="btn btn-primary">Confirmar</button>
 </div>
 </div>
 </div>
</div>
{{Form::Close()}}