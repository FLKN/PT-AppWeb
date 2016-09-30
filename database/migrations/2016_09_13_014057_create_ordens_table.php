<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordens', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('costo_total');
			$table->integer('cant_platillos');
			$table->timestamp('hora_creacion');
			$table->integer('id_habitacion')->unsigned();
          	$table->foreign('id_habitacion')->references('id')->on('habitacions')->onDelete('cascade');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ordens');
	}

}
