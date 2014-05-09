@extends('layouts.admin')


@section('content')
<section class="container">
    <section class="header">
        <h1>Unidades de negocio</h1>
        
        <input type="button" class="btn btn-warning pull-right btn-new-area" data-url="{{ route('areas.create')}}" value="Nueva Unidad de Negocio"/>
    </section>
    <section class="row">
        <table class="table table-hover tblareas">
            <thead>
                <tr>
                    <th> Alias </th>                                        
                    <th> Nombre </th>                    
                    <th> Eliminar </th>
                </tr>                
            </thead>
            <tbody>            
                @foreach($areas as $area)
                <tr class="btn-edit-area" data-id="{{$area->id}}" data-url="{{route('areas.edit',$area->id)}}">
                    <td>
                        {{$area->alias}}
                    </td>                                        
                    <td>
                        {{$area->title}}
                    </td>                    
                    <td>
                        <i data-id="{{$area->id}}" class="delete fa fa-trash-o fa-2x"></i> 
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">{{$areas->links()}}</td>
                </tr>
            </tfoot>
        </table>
        {{Form::open(array('route'=>'areas.delete','method'=>'delete','class'=>'frmDelete'))}}
            {{Form::hidden('txtid',null,array('class'=>"txtdelete"))}}
        {{Form::close()}}
    </section>
</section>

@stop