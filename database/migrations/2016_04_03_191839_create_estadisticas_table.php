<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadisticas', function(Blueprint $table)
		{
          $table->increments('id');
          $table->string('Sensor');
          $table->integer('Tiempo_vida');
          $table->integer('Tiempo_uso');
          $table->integer('Energia_consumida');
          $table->string('remember_token');
    
          $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estadisticas');
	}

}
