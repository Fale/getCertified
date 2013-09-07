<?php

Route::get('/', array('as' => 'home', function(){ return View::make('home'); }));
Route::get('providers', array('as' => 'providers', 'uses' => 'CertController@showProviders'));
Route::get('certifications', array('as' => 'certifications', 'uses' => 'CertController@showCertifications'));
Route::get('exams', array('as' => 'exams', 'uses' => 'CertController@showExams'));
Route::get('about-us', array('as' => 'about-us', function(){ return View::make('about-us'); }));
Route::get('contact-us', array('as' => 'contact-us', function(){ return View::make('contact-us'); }));

Route::get('p/{provider}', array('uses' => 'CertController@showProviderById'));
Route::get('c/{certification}', array('uses' => 'CertController@showCertificationById'));
Route::get('e/{exam}', array('uses' => 'CertController@showExamById'));

Route::get('{provider}', array('uses' => 'CertController@showProvider'));
Route::get('{provider}/c/{certification}', array('uses' => 'CertController@showCertification'));
Route::get('{provider}/e/{exam}', array('uses' => 'CertController@showExam'));