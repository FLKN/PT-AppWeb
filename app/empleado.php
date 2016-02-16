<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class empleado extends Model {

	protected $table = 'empleados';

    protected $fillable = ['nombre', 'ap_pat', 'ap_mat', 
    	'fecha_nac', 'sexo', 'foto', 'direccion', 'telefono', 
    	'hora_init', 'hora_fin', 'id_usuario'];
}
