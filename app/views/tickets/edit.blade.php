<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Editar Reporte</h4>
</div>
{{ Form::model($ticket,array('route' => array('clients.tickets.update',$ticket->id),'role'=>'form','id'=>'frmTickets','method'=>'put')) }}
<div class="modal-body">

    <div class="form-group">
        {{Form::label('title', 'Asunto')}}
        {{Form::text('title',null,array('class'=>'form-control','placeholder'=>'no se cierran las vacantes'))}}
    </div>
    <div class="form-group">
        {{Form::label('category_id', 'Categoria')}}
        {{Form::select('category_id',$categories,null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('area_id', 'Unidad de negocio')}}
        {{Form::select('area_id',$areas,null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Descripcion')}}
        {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>'He notado que no se han cerrado las vacantes automaticas ya tienen mes'))}}
    </div>
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-success {{($ticket->status=='Abierto')?'active':''}}">
            {{Form::radio('status', 'Abierto', null,array('id'=>'option1'))}} Abierto
        </label>
        <label class="btn btn-warning {{($ticket->status=='Pendiente')?'active':''}}">
            {{Form::radio('status', 'Pendiente', null,array('id'=>'option2'))}} Pendiente
        </label>
        <label class="btn btn-danger {{($ticket->status=='Cerrado')?'active':''}}">
            {{Form::radio('status', 'Cerrado', null,array('id'=>'option3'))}} Cerrado
        </label>
    </div>
</div>
<div class="modal-footer">
    <input type="submit" value="Guardar Reporte" class="btn btn-primary btn-save-ticket">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
</div>

{{ Form::close() }}