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
use App\evento;
use App\platillo;
use App\estadistica;

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

  public function editarEmpleado($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $empleado_editable = empleado::where('id',$id)->first();
    
    return view ('pt_dash.editar_empleados')
      ->withEmpleado($empleado)
      ->withEditable($empleado_editable);
  }

  public function editateEmpleado()
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

  public function agregarEmpleado()
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
        $empleado_nuevo->foto = file_get_contents(public_path()."/images/usericon.jpg");
      
      $empleado_nuevo->direccion = $input["direccion"];
      $empleado_nuevo->telefono = str_replace("-","",$input["telefono"]);
      $empleado_nuevo->hora_init = date("H:i",strtotime($input["hora_init"]));
      $empleado_nuevo->hora_fin = date("H:i",strtotime($input["hora_fin"]));
      $empleado_nuevo->id_usuario = $id_usuario;

      $empleado_nuevo->save();


      return redirect()->back();
    }
  }

  public function eliminateEmpleado($id)
  {
    usuario::where('id',$id)->delete();

    return $id;
  }


  public function verEventos()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $eventos = evento::all();
    return view ('pt_dash.ver_eventos')
      ->withEmpleado($empleado)
      ->withEventos($eventos);
  }

  public function editarEvento($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $evento_editable = evento::where('id',$id)->first();
    
    return view ('pt_dash.editar_eventos')
      ->withEmpleado($empleado)
      ->withEditable($evento_editable);
  }

  public function editateEvento()
  {
    $input = Request::all();

    $id = $input["evento_id"];

    $evento = evento::find($id);

    $evento->nombre = $input["nombre"];
    $evento->ubicacion = $input["ubicacion"];
    $evento->duracion = $input["duracion"];
    if ( \Input::hasFile('imagen') )
      $evento->imagen = file_get_contents( \Input::file("imagen") );
    
    $evento->descripcion = $input["descripcion"];

    $evento->save();

    return redirect()->back();
  }

  public function agregarEvento()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_eventos')
      ->withEmpleado($empleado);
  }

  public function agregateEvento()
  {
    $input = Request::all();
    
    $evento_nuevo = new evento;

    $evento_nuevo->nombre = $input["nombre"];
    $evento_nuevo->ubicacion = $input["ubicacion"];
    $evento_nuevo->duracion = $input["duracion"];
    if ( \Input::hasFile('imagen') )
        $evento_nuevo->imagen = file_get_contents( \Input::file("imagen") );
      else
        $evento_nuevo->imagen = file_get_contents(public_path()."/images/usericon.jpg"); 
    $evento_nuevo->descripcion = $input["descripcion"];

    $evento_nuevo->save();

    return redirect()->back();
    
  }

  public function eliminateEvento($id)
  {
    evento::where('id',$id)->delete();

    return $id;
  }

  public function verEstadisticas()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $estadistica = estadistica::all();
    return view ('pt_dash.ver_estadisticas')
      ->withEmpleado($empleado)
      ->withEstadistica($estadistica);
  }
  public function eliminatePlatillo($id)
  {
    platillo::where('id',$id)->delete();

    return $id;
  }

  public function verPlatillos()
  {
        $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $platillo = platillo::all();
    return view ('pt_dash.ver_platillos')
      ->withEmpleado($empleado)
      ->withPlatillo($platillo);
    }
  public function editatePlatillo()
  {
    $input = Request::all();

    $id = $input["platillo_id"];

    $platillo = platillo::find($id);

    $platillo->nombre = $input["nombre"];
    $platillo->descropcion = $input["descripcion"];
    $platillo->precio = $input["precio"];
    if ( \Input::hasFile('imagen') )
      $platillo->imagen = file_get_contents( \Input::file("imagen") );
    
      $platillo->save();

    return redirect()->back();
  }

  public function editarPlatillo($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $platillo_editable = platillo::where('id',$id)->first();
    
    return view ('pt_dash.editar_platillos')
      ->withEmpleado($empleado)
      ->withEditable($platillo_editable);
  }

  
 
 public function agregarPlatillo()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_platillos')
      ->withEmpleado($empleado);
  }
  
  public function agregatePlatillo()
  {
    $input = Request::all();
    
    $platillo_nuevo = new platillo;

    $platillo_nuevo->nombre = $input["nombre"];
    $platillo_nuevo->descripcion = $input["descripcion"];
    $platillo_nuevo->precio = $input["precio"];
    if ( \Input::hasFile('imagen') )
        $platillo_nuevo->imagen = file_get_contents( \Input::file("imagen") );
      else
        $platillo_nuevo->imagen = file_get_contents(public_path()."/images/usericon.jpg"); 

    $platillo_nuevo->save();

    return redirect()->back();
    
  }

}

