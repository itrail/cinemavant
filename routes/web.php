<?php

//podstawowe podstrony
Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');

Route::get('/price_list', 'PriceListController@price_list');
Route::get('/repertoire', 'RepertoireController@repertoire');
Route::get('/contact', 'ContactController@contact');

Route::get('/reservations', 'ReservationController@myReservations');
Route::post('/reservations', 'ReservationController@resign');
//logowanie i rejestracja
Route::get('session/get','SessionsController@accessSessionData');
Route::get('session/remove','SessionsController@deleteSessionData');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@login_form');
Route::post('/login', 'SessionsController@authenticate');

//edycja danych użytkownika
Route::get('/modify_data', 'IndexController@modify_data');
Route::post('/modify_data', 'IndexController@modify');
Route::get('/change_password', 'IndexController@change_password');
Route::post('/change_password', 'IndexController@change');

//administrator
Route::get('/admin', 'AdminController@login');
Route::post('/admin', 'AdminController@authenticate');
Route::get('admin/logout','AdminController@deleteSessionData');

Route::get('/admin/index', 'AdminController@index');

Route::get('/admin/add_hall', 'IndexController@hall');
Route::post('/admin/add_hall', 'IndexController@add_hall');

Route::get('/admin/add_movie', 'IndexController@movie');
Route::post('/admin/add_movie', 'IndexController@add_movie');
Route::post('/admin/remove_movie', 'IndexController@remove_movie');

Route::get('/admin/add_seance', 'IndexController@seance');
Route::post('/admin/add_seance', 'IndexController@add_seance');
Route::post('/admin/remove_seance', 'IndexController@remove_seance');

Route::get('/{seance}', 'ReservationController@index');
Route::post('/reservation/{seance}', 'ReservationController@reserve');


//Route::get('/index/create', 'IndexController@create');

//Route::get('/index/{page}', 'IndexController@show');

//Route::post('/index', 'IndexController@store');

//Route::post('/index/{page}/reviews', 'IndexController@store');


