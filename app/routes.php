<?php

Route::get('/', array('as' => 'home', function(){ return View::make('hello'); }));

Route::get('{provider}', array('uses' => 'CertController@showProvider'));
Route::get('{provider}/{certification}', array('uses' => 'CertController@showCertification'));