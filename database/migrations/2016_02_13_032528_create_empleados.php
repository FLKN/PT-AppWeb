<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre',100);
          $table->string('ap_pat',100);
          $table->string('ap_mat',100)->nullable();
          $table->date('fecha_nac');
          $table->integer('sexo');
          $table->string('direccion',300);
          $table->string('telefono',15);
          $table->time('hora_init');
          $table->time('hora_fin');
          $table->integer('id_usuario')->unsigned();
          $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
          $table->timestamps();
        });
        DB::statement("ALTER TABLE empleados ADD COLUMN foto LONGBLOB AFTER sexo");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
