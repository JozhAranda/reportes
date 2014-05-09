<div class="form-group">
	{{ Form::label('email', 'Correo electrónico') }}
	{{ Form::email('email', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('token_id', 'Token') }}
	{{ Form::text('token', str_random(18), array('class' => 'form-control', 'disabled')) }}
	{{ Form::hidden('token_id', str_random(18)) }}
</div>

<div class="form-group">
	<div class="col-md-6" style="margin-left: -15px;">
	{{ Form::label('role_id', 'Role de usuario') }}
	{{ Form::select('role_id', $role, null, array('class'=>'form-control')) }}
	</div>
	<div class="col-md-6" style="margin-left: -15px;">
	{{ Form::label('area_id', 'Area de servicio') }}
	{{ Form::select('area_id', $area, null, array('class'=>'form-control')) }}
	</div>
</div>

<div class="form-group" style="margin-top: 100px;">
	<input type="button" id="referer" class="btn btn-default" value="Cancel">
	{{ Form::submit(trans('buttons.send'), array('class' => 'btn btn-success', 'id' => 'btn-invitation')) }}
</div>
