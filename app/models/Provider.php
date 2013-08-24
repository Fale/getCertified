<?php

class Provider extends Eloquent {

	public function certifications()
    {
        return $this->hasMany('Certification');
    }

	public function exams()
    {
        return $this->hasMany('Exam');
    }
}