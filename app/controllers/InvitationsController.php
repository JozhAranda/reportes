<?php

class InvitationsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$invitations = Invitation::orderBy('id', 'desc')->take(20)->get();

		return View::make('invitations.index', compact('invitations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$invitation = new Invitation;

		$role = Role::lists('title', 'id');
		$area = Area::lists('title', 'id');

		return View::make('invitations.create', compact('invitation'))->with('role', $role)->with('area', $area);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$input = Input::all();

			$invitation = new Invitation;
			
			$invitation->email 		= $input['email'];
			$invitation->token_id 	= $input['token_id'];
			$invitation->role_id 	= $input['role_id'];
			$invitation->area_id 	= $input['area_id'];

			$validator = Validator::make($input, Invitation::$rules, Invitation::$messages);

			if ($validator->fails()) 
				
				return Redirect::to('invitations/')->with('error', 'Error, formulario vacio.');//throw new Exception($validator->messages());
			
			else {	

				$invitation->save();

				Mail::send('invitations.notification.welcome', array('email'=>Input::get('email'), 'token'=>Input::get('token_id')), function($message) {
				    $message->to(Input::get('email'), 'Invitación')->subject('Bienvenido a Tickets App');
				});
			}
		} 
		catch(Exception $ex)
		{
			return Redirect::to('invitations/')->with('error', 'Error, invitación existente.');//Log::error($ex->getMessage());
		}

		return Redirect::to('invitations/');
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
		$invitation = Invitation::findOrfail($id);

		return View::make('invitations.edit', compact('invitation'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
		{

			$rows = DB::table('invitations')->where('token_id', $id)->get();
			
			/*Insert user*/
			$user = new User;
			$pass = str_random(7);

			foreach ($rows as $row) {
				$user->email 	= $row->email;
				$user->password = Hash::make($pass);
				$user->status 	= 1;
				$user->role_id  = $row->role_id;

				//$validator = Validator::make($row, User::$rules_token);

				//if ($validator->fails()) 
					
				//	return Redirect::to('/')->with('notice', 'Error, correo electrónico existente.');//throw new Exception($validator->messages());
				
				//else 

					$user->save();
			}
			/*End insert user*/
		} 
		catch(Exception $ex)
		{
			//return Redirect::to('/')->with('notice', 'Error, correo electrónico existente.');
			Log::error($ex->getMessage());
		}
		
		return Redirect::to('/')->with('notice', 'Tu contraseña es: '.$pass);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}