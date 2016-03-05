<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model {

	protected $table = 'eventos';

    protected $fillable = ['nombre', 'duracion', 'ubicacion', 'descripcion', 'imagen'];

}
