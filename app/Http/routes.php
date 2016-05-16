<?php
Route::get('/', function(){ return view('pt_page.home'); });

Route::get('/dash', ['middleware' => 'auth', 'uses' =>'DashboardControl@home']);
Route::get('/dash/login', 'DashboardControl@login');
Route::get('/dash/logout', ['middleware' => 'auth', 'uses' =>'DashboardControl@logout']);
Route::post('/login', 'DashboardControl@authenticate');

Route::get('/dash/empleados', 'DashboardControl@verEmpleados');
Route::get('/dash/empleados/agregar', 'DashboardControl@agregarEmpleado');
Route::get('/dash/empleados/editar/{id?}', 'DashboardControl@editarEmpleado');
Route::post('/dash/empleados/editate', 'DashboardControl@editateEmpleado');
Route::post('/dash/empleados/agregate', 'DashboardControl@agregateEmpleado');
Route::get('/dash/empleados/eliminate/{id?}', 'DashboardControl@eliminateEmpleado');

Route::get('/dash/estadisticas', 'DashboardControl@verEstadisticas');


Route::get('/dash/platillos', 'DashboardControl@verPlatillos');
Route::get('/dash/platillos/agregar', 'DashboardControl@agregarPlatillo');
Route::get('/dash/platillos/editar/{id?}', 'DashboardControl@editarPlatillo');
Route::post('/dash/platillos/editate', 'DashboardControl@editatePlatillo');
Route::post('/dash/platillos/agregate', 'DashboardControl@agregatePlatillo');
Route::get('/dash/platillos/eliminate/{id?}', 'DashboardControl@eliminatePlatillo');

Route::get('/dash/eventos', 'DashboardControl@verEventos');
Route::get('/dash/eventos/agregar', 'DashboardControl@agregarEvento');
Route::get('/dash/eventos/editar/{id?}', 'DashboardControl@editarEvento');
Route::post('/dash/eventos/editate', 'DashboardControl@editateEvento');
Route::post('/dash/eventos/agregate', 'DashboardControl@agregateEvento');
Route::get('/dash/eventos/eliminate/{id?}', 'DashboardControl@eliminateEvento');