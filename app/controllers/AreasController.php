<?php

class AreasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('areas.index', array('title'=>'Unidades de Negocio','areas'=>Area::orderBy('created_at', 'desc')->paginate(10)));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		#$v= Validator::make(Input::all(), $rules)
             
             return View::make('areas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $response['success']=true;
            $area= new Area;
            $area->title=  Input::get('title');
            $area->alias=  Input::get('alias');
            $area->save();
            $response['area']=array('id'=>$area->id,'title'=>$area->title,'alias'=>$area->alias);
               
            return $response;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$area=Area::find($id);                
                return View::make('areas.edit',array('area'=>$area));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $response['success']=true;
            $response['edit']=true;
            $area=Area::find($id);
            $area->title=  Input::get('title');
            $area->alias=  Input::get('alias');
            $area->save();
            $response['area']=array('id'=>$area->id,'title'=>$area->title,'alias'=>$area->alias);
            return $response;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$response['success']=true;      
                Area::destroy(Input::get('txtid'));
                return $response;      
	}

}