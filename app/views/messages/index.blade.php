@extends('layouts.admin')


@section('content')
<section class="container">
    <section class="header">
        <h1>Usuarios</h1>
        
        <input type="button" class="btn btn-warning pull-right btn-new-user" data-url="{{ route('users.create')}}" value="Nuevo Usuario"/>
    </section>
    <section class="row">
        <table class="table table-hover tblusers">
            <thead>
                <tr>
                    <th> Email </th>
                    <th> Nombre </th>
                    <th> Tipo </th>
                    <th> Status </th>
                    <th> Eliminar </th>
                </tr>                
            </thead>
            <tbody>            
                @foreach($users as $user)
                <tr class="btn-edit-user" data-id="{{$user->id}}" data-url="{{route('users.edit',$user->id)}}">
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->profile->name.' '.$user->profile->lastname}}
                    </td>
                    <td>
                        {{$user->permission->title}}
                    </td>
                    <td>
                        {{($user->status)?'Activo':'Inactivo'}}
                    </td>
                    <td>
                        <i data-id="{{$user->id}}" class="delete fa fa-trash-o fa-2x"></i> 
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">{{$users->links()}}</td>
                </tr>
            </tfoot>
        </table>
        {{Form::open(array('route'=>'users.delete','method'=>'delete','class'=>'frmDelete'))}}
            {{Form::hidden('txtid',null,array('class'=>"txtdelete"))}}
        {{Form::close()}}
    </section>
</section>

@stop