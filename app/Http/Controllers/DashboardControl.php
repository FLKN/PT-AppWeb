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

    if ( \Input::hasFile('foto') )
      $empleado->foto = file_get_contents( \Input::file("foto") );

    $empleado->direccion = $input["direccion"];
    $empleado->telefono = str_replace("-","",$input["telefono"]);
    $empleado->hora_init = date("H:i",strtotime($input["hora_init"]));
    $empleado->hora_fin = date("H:i",strtotime($input["hora_fin"]));

    $empleado->save();

    return  redirect()->back();
  }

  public function agregarEmpleados()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_empleados')
      ->withEmpleado($empleado);
  }

  public function agregateEmpleado()
  {
    $input = Request::all();
    
    $usuario = strtolower($input['nombre']).".".strtolower($input['ap_pat']);

    
    
    if(usuario::where('user_name',$usuario)->count()>0)
      return "error";
    else {
      
      $img_predet = imagecreatefromjpeg('/images/user-icon.jpg');
      header("Content-type: image/jpeg");
      imagejpeg($img_predet);

      dd(var_dump($img_predet));
      $usuario_nuevo = new usuario;
      
      $usuario_nuevo->user_name = $usuario;
      $usuario_nuevo->nivel = 1;

      $usuario_nuevo->save();


      $id_usuario = usuario::where('user_name',$usuario)->get()[0]->id;
      usuario::where('id','=',$id_usuario)
        ->update([
          'password' => Hash::make($input['password'])
      ]);


      $empleado_nuevo = new empleado;

      $empleado_nuevo->nombre = $input["nombre"];
      $empleado_nuevo->ap_pat = $input["ap_pat"];
      $empleado_nuevo->ap_mat = $input["ap_mat"];
      $empleado_nuevo->fecha_nac = $input["fecha_nac"];
      $empleado_nuevo->sexo = $input["sexo"];
      if ( \Input::hasFile('foto') )
        $empleado_nuevo->foto = file_get_contents( \Input::file("foto") );
      else
        $empleado_nuevo->foto = $img_predet;
      $empleado_nuevo->direccion = $input["direccion"];
      $empleado_nuevo->telefono = str_replace("-","",$input["telefono"]);
      $empleado_nuevo->hora_init = date("H:i",strtotime($input["hora_init"]));
      $empleado_nuevo->hora_fin = date("H:i",strtotime($input["hora_fin"]));
      $empleado_nuevo->id_usuario = $id_usuario;

      $empleado_nuevo->save();

      imagedestroy($img_predet);

      $user=Auth::user();
      $empleado = empleado::where('id_usuario','=',$user->id)->first();
      $empleados = empleado::all();
      
      return redirect('pt_dash.ver_empleados')
        ->withEmpleado($empleado)
        ->withEmpleados($empleados);
    }
  }
}
