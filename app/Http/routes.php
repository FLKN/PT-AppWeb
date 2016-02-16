<?php


Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');

Route::get('/empleados', 'DashboardControl@verEmpleados');
Route::get('/empleados/añadir', 'DashboardControl@añadirEmpleados');

Route::post('/login', 'DashboardControl@authenticate');
