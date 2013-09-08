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
        return $this->belongsToMany('Certification', 'certification_certification_requirement', 'certification_id', 'required_id')->withPivot('group_id', 'is_optional');
    }

    public function dependencyGroups()
    {
        return $this->belongsToMany('Group');
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