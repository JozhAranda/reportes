<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
    <h4 class="modal-title">Nueva Unidad de Negocio</h4>
</div>
{{ Form::open(array('route' => 'areas.store','role'=>'form','id'=>'frmAreas')) }}
<div class="modal-body">

    <div class="form-group">            
        {{Form::label('title', 'Nombre')}}        
        {{Form::text('title',null,array('class'=>'form-control','placeholder'=>'Empleonuevo'))}}                    
    </div>    
    <div class="form-group">            
        {{Form::label('alias', 'Abreviacion')}}        
        {{Form::text('alias',null,array('class'=>'form-control','placeholder'=>'EN'))}}                    
    </div>        
</div>
<div class="modal-footer">    
    <input type="submit" value="Guardar Area" class="btn btn-primary btn-save-area">     
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{{ Form::close() }}