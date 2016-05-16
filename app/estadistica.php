<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class estadistica extends Model {

	protected $table = 'estadisticas';

    protected $fillable = ['Sensor','Tiempo_vida','Tiempo_uso','Energia_consumida'];

}
