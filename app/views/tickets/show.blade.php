@extends('layouts.client')

@section('content')
<section class="container">
    <section class="header">
        <h1>Reporte:<small> {{$ticket->title}}</small></h1>        
        <input type="button" class="btn btn-warning pull-right btn-new-message" data-url="{{route('clients.message.create',$ticket->id)}}" value="Nuevo Mensaje"/>
    </section>
    <section class="row messages">
        <div class="panel panel-primary">
            <div class="panel-heading">{{$ticket->client->profile->name. ' '.$ticket->client->profile->lastname}}</div>
            <div class="panel-body">
                {{$ticket->description}}
            </div>
            <div class="panel-footer">{{$ticket->created_at}}</div>
        </div>        
        
        @foreach ($messages as $index => $message)
        <div class="panel panel-{{(!$index ||  $index % 2 === 0)?'info':'primary'}}">
            <div class="panel-heading">{{$message->user->profile->name.' '.$message->user->profile->lastname}}</div>
            <div class="panel-body">
                {{$message->text}}
            </div>
            <div class="panel-footer">{{$message->created_at}}</div>
        </div>        
        @endforeach
    </section>
</section>

@stop