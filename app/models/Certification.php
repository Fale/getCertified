<?php

class Certification extends Eloquent {

    public function provider()
    {
        return $this->belongsTo('Provider');
    }
}