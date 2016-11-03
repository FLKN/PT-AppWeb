<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class huesped extends Model {

	public function scopeSelectuserid($query,$id_habitacion){
		$query->select('huespeds.id_usuario')
			->join('usuarios','huespeds.id_usuario','=','usuarios.id')
			->where('huespeds.id_habitacion',$id_habitacion);

    }

}
