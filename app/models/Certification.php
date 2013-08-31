<?php

class Certification extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }

    public function requires()
    {
        return $this->hasMany('Requirement');
    }

    public function exams()
    {
        return $this->requires->where('requirement_type', 'Exam');
        //return $this->requires;
    }

}