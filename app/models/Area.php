<?php

class Area extends Eloquent {
	protected $fillable = array();
        
        public function tickets() {
        return $this->HasMany('Ticket');
    }
}