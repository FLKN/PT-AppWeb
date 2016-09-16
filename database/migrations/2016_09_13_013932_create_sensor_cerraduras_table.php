<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorCerradurasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sensor_cerraduras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('estado');
			$table->integer('id_sensor')->unsigned();
          	$table->foreign('id_sensor')->references('id')->on('sensors')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sensor_cerraduras');
	}

}
