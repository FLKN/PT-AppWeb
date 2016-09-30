<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaEventoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agenda_eventos', function(Blueprint $table)
		{
			$table->integer('id_agenda')->unsigned();
          	$table->foreign('id_agenda')->references('id')->on('agendas')->onDelete('cascade');	
          	$table->integer('id_evento')->unsigned();
          	$table->foreign('id_evento')->references('id')->on('eventos')->onDelete('cascade');	
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
