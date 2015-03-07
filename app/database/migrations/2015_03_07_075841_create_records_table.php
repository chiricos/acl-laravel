<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records',function($table)
		{
			$table->increments('id');
			$table->integer('business_id');
			$table->string('state_one');
			$table->string('state_two');
			$table->string('state_three');
			$table->string('state_four');
			$table->string('state_five');
			$table->string('state_six');
			$table->string('state_seven');
			$table->string('state_eight');
			$table->string('state_nine');
			$table->string('state_teen');
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
		Schema::drop('records');
	}

}
