<?php

class TicketsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $status = array('Abierto' => 'success', 'Cerrado' => 'danger', 'Pendiente' => 'warning');
        return View::make('tickets.index', array('tickets' => Ticket::with('support', 'client')->orderBy('created_at', 'desc')->paginate(10), 'status' => $status));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {                        
        return View::make('tickets.create', array('categories' => Category::lists('title', 'id'), 'areas' => Area::lists('title', 'id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $response['success'] = true;
        $status = array('Abierto' => 'success', 'Cerrado' => 'danger', 'Pendiente' => 'warning');

        $ticket = new Ticket();
        $ticket->alias = Area::find(Input::get('area_id'))->alias;
        $ticket->title = Input::get('title');
        $ticket->area_id = Input::get('area_id');
        $ticket->category_id = Input::get('category_id');
        $ticket->client_id = 15;
        $ticket->support_id = null;
        $ticket->status = "Abierto";
        $ticket->save();
        $ticket->alias.=$ticket->id;
        $ticket->save();

        $response['ticket'] = array('alias' => $ticket->alias, 'title' => $ticket->title, 'status' => $ticket->status,
            'status_class' => $status[$ticket->status], 'area' => $ticket->area->title, 'created' => $ticket->created_at,
            'updated' => $ticket->updated_at, 'category' => $ticket->category->title,
            'client' => $ticket->client->profile->name . ' ' . $ticket->client->profile->lastname,
            'support' => 'Sin asignar', 'id' => $ticket->id);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {        
        $ticket = Ticket::find($id);
//         dd($ticket->messages());
         return View::make('tickets.show', array('categories' => Category::lists('title', 'id'), 'areas' => Area::lists('title', 'id'), 'ticket' => $ticket,'messages'=>  $ticket->messages()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {        
        $ticket = Ticket::find($id);
        return View::make('tickets.edit', array('categories' => Category::lists('title', 'id'), 'areas' => Area::lists('title', 'id'), 'ticket' => $ticket));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $response['success'] = true;
        $response['edit'] = true;
        $status = array('Abierto' => 'success', 'Cerrado' => 'danger', 'Pendiente' => 'warning');
        $ticket = Ticket::find($id);
        $ticket->alias = Area::find(Input::get('area_id'))->alias . $ticket->id;
        $ticket->title = Input::get('title');
        $ticket->area_id = Input::get('area_id');
        $ticket->category_id = Input::get('category_id');
        $ticket->status = Input::get('status');
        $ticket->save();
        $support = (isset($ticket->support->profile->name)) ? $ticket->support->profile->name . ' ' . $ticket->support->profile->lastname : 'Sin Asignar';
        $response['ticket'] = array('alias' => $ticket->alias, 'title' => $ticket->title, 'status' => $ticket->status,
            'status_class' => $status[$ticket->status], 'area' => $ticket->area->title, 'created' => $ticket->created_at,
            'updated' => $ticket->updated_at, 'category' => $ticket->category->title,
            'client' => $ticket->client->profile->name . ' ' . $ticket->client->profile->lastname,
            'support' => $support, 'id' => $ticket->id);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        $response['success'] = true;
        Ticket::destroy(Input::get('txtid'));
        return $response;
    }

}
