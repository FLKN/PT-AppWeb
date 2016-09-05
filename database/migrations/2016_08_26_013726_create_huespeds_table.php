<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuespedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('huespeds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre',100);
          	$table->string('ap_pat',100);
          	$table->string('ap_mat',100)->nullable();
          	$table->date('fecha_nac');
          	$table->integer('sexo');
          	$table->string('direccion',300);
          	$table->string('telefono',15);

          	$table->integer('id_habitacion')->unsigned();
          	$table->foreign('id_habitacion')->references('id')->on('habitacions')->onDelete('cascade');
          	$table->integer('id_usuario')->unsigned();
          	$table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');


			$table->timestamps();
		});
		DB::statement("ALTER TABLE huespeds ADD COLUMN foto LONGBLOB AFTER sexo");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('huespeds');
	}

}
