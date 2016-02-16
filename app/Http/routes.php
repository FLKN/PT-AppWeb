<?php


Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');
Route::get('/dash/logout', ['middleware' => 'auth', 'uses' =>'DashboardControl@logout']);
Route::post('/login', 'DashboardControl@authenticate');

Route::get('/dash/empleados', 'DashboardControl@verEmpleados');
Route::get('/dash/empleados/añadir', 'DashboardControl@añadirEmpleados');
