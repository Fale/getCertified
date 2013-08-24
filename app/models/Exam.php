<?php

class Exam extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }
}