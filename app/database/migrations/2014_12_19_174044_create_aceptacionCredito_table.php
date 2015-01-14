<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAceptacionCreditoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aceptacionCreditos',function($table)
		{
			$table->increments('id');

			$table->string('nombre');
			$table->integer('valor');
			$table->integer('requerido');

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
		Schema::drop('aceptacionCreditos');
	}

}
