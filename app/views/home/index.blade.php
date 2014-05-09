@extends('layouts.login')

@section('content')

{{ Form::open(array('url' => 'foo/bar','role'=>'form','class'=>'col-lg-5 center-block')) }}
    
    <div class="form-group">
        <h1>Iniciar Sesion</h1>
    </div>    
    <div class="form-group">
        {{Form::label('email', 'Correo')}}
        {{Form::email('email', $value = null, array('placeholder'=>'example@example.com','class'=>'form-control'))}}
    </div>    
    <div class="form-group">
        {{Form::label('password', 'Contraseña')}}
        {{Form::password('password', array('class'=>'form-control'))}}
    </div>    
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
{{ Form::close() }}
@stop