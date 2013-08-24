<?php

class Exam extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }

    public function certifications()
    {
        return $this->belongsToMany('Certification');
    }

    public function languages()
    {
        return $this->belongsToMany('Language');
    }

}