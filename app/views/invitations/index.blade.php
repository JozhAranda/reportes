@extends('layouts.admin')


@section('content')
<div class="col-md-12">
	<h1>Invitations</h1>
	<hr>
	
	@if(Session::has('notice'))
		<p class="bg-danger" style="padding:15px"> Error: {{ Session::get('notice') }} </p>
	@endif 
	
	<div class="form-group">
		{{ link_to_route('invitations.create', 'Create Invitation', null, ['class' => 'btn btn-success']) }}
	</div>

	@if ($invitations->count())

	<table class="table table-bordered table-striped">
		<colgroup>
			<col class="col-md-1">
			<col class="col-md-3">
			<col class="col-md-4">
			<col class="col-md-2">
			<col class="col-md-2">
		</colgroup>
		<thead>
			<tr>
				<th>Id</th>
				<th>Email</th>
				<th>Token</th>
				<th>Role</th>
				<th>Area</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($invitations as $invitation)
			<tr>
				<td>{{ $invitation -> id }}</td>
				<td>{{ $invitation -> email }}</td>
				<td>{{ $invitation -> token_id }}</td>
				<td>{{ $invitation -> role_id }}</td>
				<td>{{ $invitation -> area_id }}</td>
			</tr>
			@endforeach
		</tbody>
        <tfoot>
            <tr>
                <td colspan="5">{{ $invitations->links() }}</td>
            </tr>
        </tfoot>
	</table>

	@endif

</div>
@stop