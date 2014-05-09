<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
    <h4 class="modal-title">Nuevo Reporte</h4>
</div>
{{ Form::open(array('route' => 'clients.tickets.store','role'=>'form','id'=>'frmTickets')) }}
<div class="modal-body">

    <div class="form-group">            
        {{Form::label('title', 'Asunto')}}        
        {{Form::text('title',null,array('class'=>'form-control','placeholder'=>'no se cierran las vacantes'))}}                    
    </div>    
    <div class="form-group">            
        {{Form::label('category_id', 'Categoria')}}        
        {{Form::select('category_id',$categories,null,array('class'=>'form-control'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('area_id', 'Unidad de negocio')}}        
        {{Form::select('area_id',$areas,null,array('class'=>'form-control'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('description', 'Descripcion')}}        
        {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'He notado que no se han cerrado las vacantes automaticas ya tienen mes'))}}                    
    </div>        
</div>
<div class="modal-footer">    
    <input type="submit" value="Guardar Reporte" class="btn btn-primary btn-save-ticket">     
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{{ Form::close() }}