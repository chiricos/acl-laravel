<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudCreditoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudCreditos',function($table)
		{
			$table->increments('id');

			$table->string('nombre');
			$table->string('apellido');
			$table->integer('cedula');
			$table->string('ciudad_residencia');
			$table->string('email');
			$table->date('fecha_expedicion');
			$table->date('fecha_nacimiento');
			$table->string('lugar_expedicion');
			$table->integer('celular');
			$table->integer('telefono');
			$table->string('direccion');
			$table->string('direccion_oficina');
			$table->string('archivo');
			$table->string('tipo_documento');
			$table->string('referencia');
			$table->string('valor_mensual');

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
		Schema::drop('solicitudCreditos');
	}

}
