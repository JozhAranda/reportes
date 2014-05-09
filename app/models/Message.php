<?php

class Message extends \Eloquent {
	protected $fillable = array();
        
        public function user(){
            return $this->belongsTo('User');
        }
        
        public function ticket(){
            return $this->belongsTo('Ticket');
        }
}