<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agendas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->time('hora_inicio');
			$table->time('hora_fin');
			$table->integer('id_habitacion')->unsigned();
          	$table->foreign('id_habitacion')->references('id')->on('habitacions')->onDelete('cascade');	
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
		Schema::drop('agendas');
	}

}
