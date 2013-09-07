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

    public function requiredCertifications()
    {
        return $this->belongsToMany('Certification', 'certification_certification_requirement', 'certification_id', 'required_id');
    }

    public function requiredByCertifications()
    {
        return $this->belongsToMany('Certification', 'certification_certification_requirement', 'required_id', 'certification_id');
    }

    public function languages()
    {
        return $this->belongsToMany('Language');
    }

}