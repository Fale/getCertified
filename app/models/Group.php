<?php

class Group extends Eloquent {

    public function certification()
    {
        return $this->belongsTo('Certification');
    }
	
}