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
use App\empleado;
use App\estadistica;
use App\evento;
use App\habitacion;
use App\huesped;
use App\platillo;
use App\sensor;
use App\usuario;



class DashboardControl extends Controller
{
  public function login()
  {
    return view ('pt_dash.login');
  }
  public function logout() 
  {
    Auth::logout();
    return redirect('/dash');
  }

  public function home () 
  {
    $user=Auth::user();
    $empleado=empleado::where('id_usuario','=',$user->id)->first();
		return view ('pt_dash.home_dash')
      ->withEmpleado($empleado)
      ->withUser($user);
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
        return redirect()->intended('/dash');

        $usuario->touch();
    } else
      return view('pt_dash.login');
  }

// Empleados routines
  public function verEmpleados()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $empleados = empleado::all();
    return view ('pt_dash.ver_empleados')
      ->withEmpleado($empleado)
      ->withEmpleados($empleados)
      ->withUser($user);
  }

  public function editarEmpleado($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $empleado_editable = empleado::where('id',$id)->first();
    
    return view ('pt_dash.editar_empleados')
      ->withEmpleado($empleado)
      ->withEditable($empleado_editable)
      ->withUser($user);
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

    $id_usuario = empleado::selectuserid($id)->get();

    usuario::where('id', $id_usuario[0]->id_usuario)->update(['nivel' => $input["nivel_empleado"]]);
    
    return redirect("/dash/empleados");
  }

  public function agregarEmpleado()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_empleados')
      ->withEmpleado($empleado)
      ->withUser($user);
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
      $usuario_nuevo->nivel = $input["nivel_empleado"];

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


      return redirect("/dash/empleados");
    }
  }

  public function eliminateEmpleado($id)
  {
    usuario::where('id',$id)->delete();
    return $id;
  }

// Eventos routines
  public function verEventos()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $eventos = evento::all();
    return view ('pt_dash.ver_eventos')
      ->withEmpleado($empleado)
      ->withEventos($eventos)
      ->withUser($user);
  }

  public function editarEvento($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $evento_editable = evento::where('id',$id)->first();
    
    return view ('pt_dash.editar_eventos')
      ->withEmpleado($empleado)
      ->withEditable($evento_editable)
      ->withUser($user);
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

    return redirect("/dash/eventos");
  }

  public function agregarEvento()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_eventos')
      ->withEmpleado($empleado)
      ->withUser($user);
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
        $evento_nuevo->imagen = file_get_contents(public_path()."/images/turismo.jpg"); 
    $evento_nuevo->descripcion = $input["descripcion"];

    $evento_nuevo->save();

    return redirect("/dash/eventos");
    
  }

  public function eliminateEvento($id)
  {
    evento::where('id',$id)->delete();

    return $id;
  }

// Platillos routines
  public function verPlatillos()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $platillo = platillo::all();
    return view ('pt_dash.ver_platillos')
      ->withEmpleado($empleado)
      ->withPlatillo($platillo)
      ->withUser($user);
  }

  public function editarPlatillo($id)
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    $platillo_editable = platillo::where('id',$id)->first();
    
    return view ('pt_dash.editar_platillos')
      ->withEmpleado($empleado)
      ->withEditable($platillo_editable)
      ->withUser($user);
  }

  public function editatePlatillo()
  {
    $input = Request::all();

    $id = $input["platillo_id"];

    $platillo = platillo::find($id);

    $platillo->nombre = $input["nombre"];
    $platillo->descripcion = $input["descripcion"];
    $platillo->precio = $input["precio"];
    if ( \Input::hasFile('imagen') )
      $platillo->imagen = file_get_contents( \Input::file("imagen") );
    
      $platillo->save();

    return redirect("/dash/platillos");
  }
 
  public function agregarPlatillo()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.agregar_platillos')
      ->withEmpleado($empleado)
      ->withUser($user);
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
        $platillo_nuevo->imagen = file_get_contents(public_path()."/images/tacos.jpg"); 

    $platillo_nuevo->save();

    return redirect("/dash/platillos"); 
  }

  public function eliminatePlatillo($id)
  {
    platillo::where('id',$id)->delete();

    return $id;
  }

// Habitaciones routines
  public function verHabitaciones()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $habitacion = habitacion::all();
    return view ('pt_dash.ver_habitaciones')
      ->withEmpleado($empleado)
      ->withHabitacion($habitacion)
      ->withUser($user);
  }

  public function agregateHabitacion()
  {
    $input = Request::all();

    $habitacion_nueva = new habitacion;
    $habitacion_nueva->precio = $input["precio"];

    $habitacion_nueva->save();

    return 0; 
  }

  public function editateHabitacion()
  {
    $input = Request::all();

    $id = $input["habitacion_id"];

    $habitacion = habitacion::find($id);
    $habitacion->precio = $input["precio"];
    $habitacion->save();

    return 0;
  }

  public function desocupateHabitacion()
  {
    $input = Request::all();
    $id_habitacion = $input['id'];
    
    $id = habitacion::where('id', $id_habitacion)->update(['estado' => 0]);

    $id_usuarios_del = huesped::selectuserid($id_habitacion)->get();
    for ($i=0 ; $i<count($id_usuarios_del) ; $i++) {
      usuario::where('id',$id_usuarios_del[$i]->id_usuario)->delete();  
    }
    
    huesped::where('id_habitacion', $id_habitacion)->delete();

    return 0;
  }

  public function ocuparHabitacion($id) 
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();

    return view ('pt_dash.ocupar_habitacion')
      ->withEmpleado($empleado)
      ->with("habitacionid",$id)
      ->withUser($user);

    return 0;
  }

  public function ocupateHabitacion() 
  {
    $input = Request::all();

    $num_usuarios = $input['num_huespedes'];
    $id_habitacion = $input['id_habitacion'];
    
    for ($i=1; $i <= $num_usuarios; $i++) {
      $usuario = strtolower($input['nombre'.$i]).".".strtolower($input['ap_pat'.$i]).".h".$id_habitacion;

      if(usuario::where('user_name',$usuario)->count()>0)
        return "error";
      else {
        
        $usuario_nuevo = new usuario;
        $usuario_nuevo->user_name = $usuario;
        $usuario_nuevo->nivel = $input['nivel_usuario'.$i];
        $usuario_nuevo->password = "";
        $usuario_nuevo->save();


        $id_usuario = usuario::where('user_name',$usuario)->get()[0]->id;
        usuario::where('id','=',$id_usuario)
          ->update([
            'app_pass' => Hash::make($input['password'.$i])
        ]);


        $huesped_nuevo = new huesped;

        $huesped_nuevo->nombre = $input["nombre".$i];
        $huesped_nuevo->ap_pat = $input["ap_pat".$i];
        $huesped_nuevo->ap_mat = $input["ap_mat".$i];
        $huesped_nuevo->fecha_nac = $input["fecha_nac".$i];
        $huesped_nuevo->sexo = $input["sexo".$i];
        if ( \Input::hasFile('foto'.$i) )
          $huesped_nuevo->foto = file_get_contents( \Input::file("foto".$i) );
        else
          $huesped_nuevo->foto = file_get_contents(public_path()."/images/usericon.jpg");
        
        $huesped_nuevo->direccion = $input["direccion".$i];
        $huesped_nuevo->telefono = $input["telefono".$i];
        $huesped_nuevo->id_usuario = $id_usuario;
        $huesped_nuevo->id_habitacion = $id_habitacion;

        $huesped_nuevo->save();
      }
    }

    $id = habitacion::where('id', $id_habitacion)->update(['estado' => 1]);

    return redirect("/dash/habitaciones");
  }

// Estadisticas routines
  public function verEstadisticas()
  {
    $user = Auth::user();
    $empleado = empleado::where('id_usuario','=',$user->id)->first();
    $estadistica = estadistica::all();
    return view ('pt_dash.ver_estadisticas')
      ->withEmpleado($empleado)
      ->withEstadistica($estadistica)
      ->withUser($user);
  }
}

