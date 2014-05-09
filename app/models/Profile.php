<?php

class Profile extends \Eloquent {
	protected $fillable = array();
        protected $table = 'profiles';
        
        public static $rules = array(
        'name' => 'required',
        'lastname'=>'required'        
        );       
                
        public function user() {
        return $this->belongsTo('User');
    }

}