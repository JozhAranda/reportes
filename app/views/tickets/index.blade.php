@extends('layouts.client')


@section('content')
<section class="container">
    <section class="header">
        <h1>Reportes</h1>
        
        <input type="button" class="btn btn-warning pull-right btn-new-ticket" data-url="{{route('clients.tickets.create')}}" value="Nuevo Reporte"/>
    </section>
    <section class="row">
        <table class="table table-hover tbltickets">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Area </th>
                    <th> Cliente </th>
                    <th> Tipo </th>
                    <th> Titulo </th>
                    <th> Estatus </th>
                    <th> Creado </th>
                    <th> Actualizado </th>
                    <th> Soporte </th>
                    <th> Eliminar </th>
                </tr>                
            </thead>
            <tbody>            
                @foreach($tickets as $ticket)                                
                <tr class="btn-edit-ticket" data-id="{{$ticket->id}}" data-url="{{route('clients.tickets.edit',$ticket->id)}}">
                    <td>
                        {{$ticket->alias}}
                    </td>
                    <td>
                        {{$ticket->area->title}}
                    </td>
                    <td>
                        {{$ticket->client->profile->name. ' '.$ticket->client->profile->lastname}}
                    </td>
                    <td>
                        {{$ticket->category->title}}
                    </td>
                    <td>
                         @if(isset($ticket->support->profile->name))
                             {{link_to_route('clients.tickets.show', $ticket->title,array('id'=>$ticket->id))}}
                        @else
                            {{$ticket->title}}
                        @endif
                    </td>
                    <td>
                        <label class="text-{{$status[$ticket->status]}}">{{$ticket->status}}</label>
                    </td>
                    <td>
                        {{$ticket->created_at}}
                    </td>
                    <td>
                        {{$ticket->updated_at}}
                    </td>
                    <td>
                        @if(isset($ticket->support->profile->name))
                            {{$ticket->support->profile->name. ' '.$ticket->support->profile->lastname}}
                        @else
                            Sin Asignar
                        @endif
                    </td>
                    <td>
                        <i data-id="{{$ticket->id}}" class="delete fa fa-trash-o fa-2x"></i> 
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10" align="center">{{$tickets->links()}}</td>
                </tr>
            </tfoot>
        </table>
        {{Form::open(array('route'=>'clients.tickets.delete','method'=>'delete','class'=>'frmDelete'))}}
            
        {{Form::close()}}
    </section>
</section>

@stop