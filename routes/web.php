<?php

Route::get('/index', 'IndexController@index');
Route::get('/price_list', 'PriceListController@price_list');
Route::get('/repertoire', 'RepertoireController@repertoire');
Route::get('/contact', 'ContactController@contact');

Route::get('/index/create', 'IndexController@create');

Route::get('/index/{page}', 'IndexController@show');

Route::post('/index', 'IndexController@store');

Route::post('/index/{page}/reviews', 'IndexController@store');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/refreshcaptcha', 'RegistrationController@refreshCaptcha');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@authenticate');
Route::get('/logout', 'SessionsController@destroy');
