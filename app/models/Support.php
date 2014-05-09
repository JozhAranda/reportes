<?php

/**
 * Support
 *
 */
class Support extends \Eloquent {

    protected $fillable = array();
    protected $table = 'support';

    public function user() {
        return $this->belongsTo('User');
    }

    public function ticket() {
        return $this->hasMany('Ticket');
    }

}
