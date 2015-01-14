<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {


	public function up()
	{
		Schema::create('users',function($table)
		{
			$table->increments('id');

			$table->string('nombre');
			$table->string('apellido');
			$table->string('correo');
			$table->string('password');
			$table->string('username');

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
		Schema::drop('users');
	}

}
