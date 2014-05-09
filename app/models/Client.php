<?php

class Client extends \Eloquent {

    protected $fillable = array();

    public function ticket() {
        return $this->hasMany('Ticket');
    }

    public function user() {
        return $this->belongsTo('User');
    }



}
