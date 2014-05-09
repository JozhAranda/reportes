<?php

class Ticket extends \Eloquent {

    protected $fillable = array();

    public function support() {
        return $this->belongsTo('User','support_id');
    }
    public function client() {
        return $this->belongsTo('User','client_id');
    }

    public function category() {
        return $this->belongsTo('Category');
    }
    
    public function area() {
        return $this->belongsTo('Area');
    }
    
    public function messages() {
        return $this->hasMany('Message');
    }

}
