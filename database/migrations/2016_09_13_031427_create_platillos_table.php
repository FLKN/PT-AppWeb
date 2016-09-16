<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatillosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('platillos', function(Blueprint $table)
		{
			$table->increments('id');
          	$table->string('nombre',150);
          	$table->string('descripcion',350);
          	$table->float('precio');
			$table->integer('id_orden')->unsigned();
          	$table->foreign('id_orden')->references('id')->on('ordens')->onDelete('cascade');
        });
	    
        DB::statement("ALTER TABLE platillos ADD COLUMN imagen LONGBLOB AFTER precio");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('platillos');
	}

}
