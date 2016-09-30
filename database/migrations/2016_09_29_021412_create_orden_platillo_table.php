<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenPlatilloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orden_platillos', function(Blueprint $table)
		{
			$table->integer('id_orden')->unsigned();
          	$table->foreign('id_orden')->references('id')->on('ordens')->onDelete('cascade');	
          	$table->integer('id_platillo')->unsigned();
          	$table->foreign('id_platillo')->references('id')->on('platillos')->onDelete('cascade');	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
