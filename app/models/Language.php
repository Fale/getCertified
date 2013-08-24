<?php

class Language extends Eloquent {

    public function certifications()
    {
        return $this->belongsToMany('Certification');
    }

    public function exams()
    {
        return $this->belongsToMany('Exam');
    }
	
}