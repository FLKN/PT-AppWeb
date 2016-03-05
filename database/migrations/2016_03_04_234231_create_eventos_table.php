<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos', function(Blueprint $table) {
			$table->increments('id');
          	$table->string('nombre',70);
          	$table->integer('duracion');
          	$table->string('ubicacion',100);
          	$table->string('descripcion',200);
          	$table->timestamps();
        });
	    
        DB::statement("ALTER TABLE eventos ADD COLUMN imagen LONGBLOB AFTER descripcion");
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventos');
	}

}

