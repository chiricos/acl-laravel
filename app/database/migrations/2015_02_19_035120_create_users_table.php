<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('last_name');
			$table->string('password');
			$table->string('restore_password');
			$table->string('email');
			$table->string('address');
			$table->integer('phone');
			$table->string('photo');
			$table->integer('in_charge_id');
			$table->integer('role_id');
			$table->string('user_name');
			$table->string('remember_token');
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
