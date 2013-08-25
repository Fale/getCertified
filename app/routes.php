<?php

Route::get('/', array('as' => 'home', function(){ return View::make('home'); }));
Route::get('/providers', array('as' => 'providers', function(){ return View::make('providers'); }));
Route::get('/certifications', array('as' => 'certifications', function(){ return View::make('certifications'); }));
Route::get('/exams', array('as' => 'exams', function(){ return View::make('exams'); }));
Route::get('/about-us', array('as' => 'about-us', function(){ return View::make('about-us'); }));
Route::get('/contact-us', array('as' => 'contact-us', function(){ return View::make('contact-us'); }));

Route::get('{provider}', array('uses' => 'CertController@showProvider'));
Route::get('{provider}/c/{certification}', array('uses' => 'CertController@showCertification'));
Route::get('{provider}/e/{exam}', array('uses' => 'CertController@showExam'));