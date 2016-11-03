<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model {

	public function scopeSelectuserid($query,$id_empleado){
		$query->select('empleados.id_usuario')
			->join('usuarios','empleados.id_usuario','=','usuarios.id')
			->where('empleados.id',$id_empleado);

    }

}
