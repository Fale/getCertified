<?php

class Provider extends Eloquent {

	public function certifications()
    {
        return $this->hasMany('Certification');
    }
}