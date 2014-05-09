<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
    <h4 class="modal-title">Nuevo Usuario</h4>
</div>
{{ Form::open(array('route' => 'users.store','role'=>'form','id'=>'frmUsers')) }}
<div class="modal-body">

    <div class="form-group">            
        {{Form::label('email', 'Correo')}}        
        {{Form::email('email',null,array('class'=>'form-control','placeholder'=>'example@domain.com'))}}                    
    </div>    
    <div class="form-group">            
        {{Form::label('password', 'Contrasena')}}        
        {{Form::password('password',array('class'=>'form-control'))}}                    
    </div>    
    <div class="form-group">            
        {{Form::label('name', 'Nombre')}}        
        {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'Mike'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('lastname', 'Apellido')}}        
        {{Form::text('lastname',null,array('class'=>'form-control','placeholder'=>'Chavez'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('permission_id', 'Permisos')}}        <br />
        {{Form::select('permission_id', $permissions, null,array('class'=>'selPermiso form-control'))}}        
    </div>    
</div>
<div class="modal-footer">    
    <input type="submit" value="Guardar Usuario" class="btn btn-primary btn-save-user">     
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{{ Form::close() }}