<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stateProducts',function($table)
        {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('business_id');
            $table->integer('quantity');
            $table->integer('value');
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
		Schema::drop('stateProducts');
	}

}
