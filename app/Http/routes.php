<?php


Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');

Route::post('/login', 'DashboardControl@authenticate');
