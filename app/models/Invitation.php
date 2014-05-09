<?php

class Invitation extends Eloquent {
	
	protected $table = 'invitations';

	protected $softDelete = true;

	/**
	 * Set fillable fields
	 */
	protected $fillable = array();

	/**
	 * Set rules
	 */
	public static $rules = array(
		'email'   	=> 'required|Between:3,60|Email|Unique:invitations',
		'token_id'	=> 'required|Min:18|Unique:invitations',
		'role_id'	=> 'required|Integer',
		'area_id'	=> 'required|Integer' 
	);

	public static $messages = array(
		'email.required' 		=> 'Required the email',
 		'email.between' 		=> 'Required the email is between 3 to 60 characters',
		'token_id.required' 	=> 'Required the token',
 		'token_id.min' 			=> 'Required the token min lenght is 18',
		'role_id.required' 		=> 'Required the role',
		'area_id.required' 		=> 'Required the area',
 		'role_id.integer' 		=> 'Required numeric the role',
 		'area_id.integer' 		=> 'Required numeric the area'
	);

	public static function validate($data, $id=null) {
		$rules = self::$rules;
		$messages = self::$messages;

		return Validator::make($data, $rules, $messages);
	}

    public function role(){
        return $this->belongsTo('Role');
    }
    
    public function area(){
        return $this->belongsTo('Area');
    }

}