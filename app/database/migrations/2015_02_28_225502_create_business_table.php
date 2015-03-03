<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business',function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('type');
			$table->integer('state');
			$table->integer('nit');
			$table->string('address');
			$table->integer('phone');
			$table->integer('ext');
			$table->string('email');
			$table->string('second_email');
			$table->integer('mobile_phone');
			$table->integer('manager');
			$table->string('photo');
			$table->string('page_web');
			$table->integer('fax');
			$table->string('country');
			$table->string('city');
			$table->string('skype');
			$table->string('maps');
			$table->date('payment_date');
			$table->date('expedition_date');
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
		Schema::drop('business');
	}

}
