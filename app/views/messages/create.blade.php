<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
    <h4 class="modal-title">Nuevo Mensaje</h4>
</div>
{{ Form::open(array('route' => 'clients.message.store','role'=>'form','id'=>'frmMessages')) }}
<div class="modal-body">    
    <div class="form-group">            
        {{Form::label('text', 'Mensaje')}}        
        {{Form::textarea('text',null,array('class'=>'form-control','placeholder'=>'Estoy trabajando en el problema pronto actualizare el ticket'))}}                    
        {{Form::hidden('ticket_id', $id)}}        
    </div>
</div>
<div class="modal-footer">    
    <input type="submit" value="Guardar Mensaje" class="btn btn-primary btn-save-msg">     
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{{ Form::close() }}