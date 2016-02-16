<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;
use Request;
use Auth;
use Hash;

//models
use App\usuario;
use App\empleado;


class DashboardControl extends Controller
{
  public function login(){
    return view ('pt_dash.login');

  }

  public function home () {
    $user=Auth::user();
    $empleado=empleado::where('id_usuario','=',$user->id)->first();
		return view ('pt_dash.home_dash')
      ->withEmpleado($empleado);
	}

  public function authenticate()
  {
    $input = Request::all();
    $credentials = array(
      'user_name' => $input['usuario'],
      'password' => $input['password'],
      'nivel' => 1
    );
    if (Auth::attempt($credentials)) {

        $usuario = usuario::find(Auth::user()->id);
        $usuario->touch();
        return redirect()->intended('/dash');

    } else
      return view('pt_dash.login');
  }

  public function verEmpleados()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $empleados = empleado::all();
    return view ('pt_dash.ver_empleados')
      ->withEmpleado($empleado)
      ->withEmpleados($empleados);

  }
}
