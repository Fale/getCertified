<?php

class Exam extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }

    public function certifications()
    {
        return $this->belongsToMany('Certification')->withPivot('group_id', 'policy');
    }

    public function languages()
    {
        return $this->belongsToMany('Language');
    }

}