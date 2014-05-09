<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        return View::make('users.index', array('users' => User::orderBy('id', 'desc')->paginate(10)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('users.create', array('permissions' => Permission::lists('title', 'id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $response['success'] = false;
        #$user=Validator::make($response, $rules);

        $vUser = Validator::make(Input::except(array('name', 'lastname')), User::$rules);

        $vProfile = Validator::make(Input::only(array('name', 'lastname')), Profile::$rules);
        if ($vUser->fails() || $vProfile->fails()) {

            $response['messages'] = array_merge($vUser->messages()->all(), $vProfile->messages()->all());
        } else {
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->role_id = Input::get('permission_id');
            $user->status = 1;
            $user->save();
            $profile = new Profile();
            $profile->name = Input::get('name');
            $profile->lastname = Input::get('lastname');
            $profile->user()->associate($user)->save();

            $response['success'] = true;
            $response['user'] = array('email' => $user->email,
                'name' => $profile->name,
                'lastname' => $profile->lastname,
                'status' => 'Activo',
                'permission' => $user->permission->title);
        }


        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = User::find($id);
        return View::make('users.edit', array('user' => $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id);
        return View::make('users.edit', array('user' => $user,
                    'status' => array('text' => ($user->status) ? 'Activo' : 'Inactivo',
                        'value' => $user->status),
                    'permissions' => Permission::lists('title', 'id')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $user = User::find($id);
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->permission_id = Input::get('permission_id');
        $user->status = Input::get('status');
        $user->save();
        $profile = $user->profile;
        $profile->name = Input::get('name');
        $profile->lastname = Input::get('lastname');
        $profile->save();
        $response['success'] = true;
        $response['edit'] = true;
        $response['user'] = array('id'=>$user->id,'email' => $user->email, 
            'name' => $profile->name . ' ' . $profile->lastname, 
            'permission' => $user->permission->title,
            'status' => ($user->status)?'Activo':'Inactivo');
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        User::destroy(Input::get('txtid'));
        $response['success'] = true;
        return $response;
    }

}
