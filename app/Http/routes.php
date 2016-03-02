<?php
Route::get('/', function(){ return view('pt_page.home'); });

Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');
Route::get('/dash/logout', ['middleware' => 'auth', 'uses' =>'DashboardControl@logout']);
Route::post('/login', 'DashboardControl@authenticate');

Route::get('/dash/empleados', 'DashboardControl@verEmpleados');
Route::get('/dash/empleados/agregar', 'DashboardControl@agregarEmpleados');
Route::get('/dash/empleados/editar/{id?}', 'DashboardControl@editarEmpleados');
Route::post('/dash/empleados/editate', 'DashboardControl@editateEmpleado');
Route::post('/dash/empleados/agregate', 'DashboardControl@agregateEmpleado');
Route::get('/dash/empleados/eliminate/{id?}', 'DashboardControl@eliminateEmpleado');