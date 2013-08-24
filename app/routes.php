<?php

Route::get('/', array('as' => 'home', function(){ return View::make('hello'); }));

Route::get('{provider}', array('uses' => 'CertController@showProvider'));
Route::get('{provider}/c/{certification}', array('uses' => 'CertController@showCertification'));
Route::get('{provider}/e/{exam}', array('uses' => 'CertController@showExam'));