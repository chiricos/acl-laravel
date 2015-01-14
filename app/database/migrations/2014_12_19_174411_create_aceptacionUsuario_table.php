<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAceptacionUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aceptacionUsuarios',function($table)
		{
			$table->increments('id');

			$table->string('referencia');
			$table->string('data_credito');
			$table->string('datos_mensual');
			$table->string('verificar_mensual');

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
		Schema::drop('aceptacionUsuarios');
	}

}
