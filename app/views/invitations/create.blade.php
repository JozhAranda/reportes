@extends('layouts.admin')

@section('content')
<div class="col-md-12">
	<h1>Send Invitation</h1>

	<hr>

	{{ Form::model($invitation, array('route' => 'invitations.store', 'id' => 'invitation')) }}
	
		@include('invitations._form')

	{{ Form::close() }}
</div>
@stop