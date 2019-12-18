<?php

Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');

Route::get('/price_list', 'PriceListController@price_list');
Route::get('/repertoire', 'RepertoireController@repertoire');
Route::get('/contact', 'ContactController@contact');

Route::get('/modify_data', 'IndexController@modify_data');
Route::post('/modify_data', 'IndexController@modify');
Route::get('/change_password', 'IndexController@change_password');
Route::post('/change_password', 'IndexController@change');

//Route::get('/index/create', 'IndexController@create');

//Route::get('/index/{page}', 'IndexController@show');

//Route::post('/index', 'IndexController@store');

//Route::post('/index/{page}/reviews', 'IndexController@store');

Route::get('session/get','SessionsController@accessSessionData');
//Route::get('session/set','SessionsController@storeSessionData');
Route::get('session/remove','SessionsController@deleteSessionData');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
//Route::get('/refreshcaptcha', 'RegistrationController@refreshCaptcha');

Route::get('/login', 'SessionsController@login_form');
Route::post('/login', 'SessionsController@authenticate');
//Route::get('/logout', 'SessionsController@destroy');
