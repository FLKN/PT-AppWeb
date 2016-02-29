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
  public function logout() {
    Auth::logout();
    return redirect('/dash');
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
      'password' => $input['password']
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

  public function editarEmpleados($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $empleado_editable = empleado::where('id',$id)->first();
    
    return view ('pt_dash.editar_empleados')
      ->withEmpleado($empleado)
      ->withEditable($empleado_editable);
  }

  public function editateEmpleado($value='')
  {
    $input = Request::all();

    $id = $input["empleado_id"];
    
    $empleado = empleado::find($id);

    $empleado->nombre = $input["nombre"];
    $empleado->ap_pat = $input["ap_pat"];
    $empleado->ap_mat = $input["ap_mat"];
    $empleado->fecha_nac = $input["fecha_nac"];
    $empleado->sexo = $input["sexo"];

    if (\Input::hasFile('foto') )
      $empleado->foto = file_get_contents( \Input::file("foto") );

    $empleado->direccion = $input["direccion"];
    $empleado->telefono = $input["telefono"];
    $empleado->hora_init = $input["hora_init"];
    $empleado->hora_fin = $input["hora_fin"];

    $empleado->save();

    return  redirect()->back();
  }
}
