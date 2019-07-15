<?php

// Resource Routes
Route::resource('/',      'HomeController');
Route::resource('/tasks', 'TasksController');

// Auth Routes (Laravel Default)
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');