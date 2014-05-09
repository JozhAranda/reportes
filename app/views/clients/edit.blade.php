<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>    
    <h4 class="modal-title">Editar Usuario</h4>
</div>
{{ Form::open(array('route' => array('users.update',$user->id),'role'=>'form','id'=>'frmUsers','method'=>'PUT')) }}
<div class="modal-body">

    <div class="form-group">            
        {{Form::label('email', 'Correo')}}        
        {{Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'example@domain.com'))}}                    
    </div>    
    <div class="form-group">            
        {{Form::label('name', 'Nombre')}}        
        {{Form::text('name',$user->profile->name,array('class'=>'form-control','placeholder'=>'Javier Lopez'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('lastname', 'Apellido')}}        
        {{Form::text('lastname',$user->profile->lastname,array('class'=>'form-control','placeholder'=>'Chavez'))}}                    
    </div>        
    <div class="form-group">            
        {{Form::label('permission', 'Permisos')}}        <br />
        {{Form::select('permission_id', $permissions, $user->permission->id,array('class'=>'selPermiso form-control'))}}        
    </div>    
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success {{{ ($status['value']) ? "active" : '' }}}">
            <input type="radio" name="status" id="option1" {{{ ($status['value']) ? "checked" : '' }}} value="1"> Activo
        </label>        
        <label class="btn btn-danger {{{ ($status['value']) ? "" : 'active' }}}">
            <input type="radio" name="status" id="option2" {{{ ($status['value']) ? "" : "checked" }}} value="0"> Inactivo
        </label>
    </div>    
</div>
<div class="modal-footer">    
    <input type="submit" value="Guardar Usuario" class="btn btn-primary btn-save-user">     
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>
{{ Form::close() }}