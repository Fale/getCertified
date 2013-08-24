<?php

class Language extends Eloquent {

    public function certifications()
    {
        return $this->belongsToMany('Certification');
    }
	
}