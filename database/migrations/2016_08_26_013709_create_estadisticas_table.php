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
			$table->float('t_vida');
          	$table->float('t_uso');
          	$table->double('energia_cons');
          	$table->integer('id_sensor')->unsigned();
          	$table->foreign('id_sensor')->references('id')->on('sensors')->onDelete('cascade');
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
