<?php


Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');
Route::get('/dash/logout', ['middleware' => 'auth', 'uses' =>'DashboardControl@logout']);
Route::post('/login', 'DashboardControl@authenticate');

Route::get('/empleados', 'DashboardControl@verEmpleados');
Route::get('/empleados/añadir', 'DashboardControl@añadirEmpleados');
