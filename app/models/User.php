<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    public static $rules = array(
        'password' => 'required',
        'email' => 'required|email|unique:users',        
        'permission_id' => 'required|integer'
    );

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

    /**
     * Set rules
     */
    public static $rules_token = array(
        'email' => 'Unique:users' 
    );

    public function role() {
        return $this->belongsTo('Role');
    }

    public function profile() {
        return $this->hasOne('Profile');
    }
    
    public function tickets() {
        return $this->hasMany('Ticket');
    }
    
    public function messages() {
        return $this->hasMany('Message');
    }

}
