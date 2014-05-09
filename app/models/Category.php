<?php

class Category extends \Eloquent {

    protected $fillable = array();

    public function ticket() {
        return $this->hasMany('Ticket');
    }

}
