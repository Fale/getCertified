<?php

class Certification extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }

    public function exams()
    {
        return $this->belongsToMany('Exam');
    }

}