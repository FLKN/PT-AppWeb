<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorVentilacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_ventilacions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('temperatura');
			$table->float('intensidad');
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
		Schema::drop('sensor_ventilacions');
	}

}
