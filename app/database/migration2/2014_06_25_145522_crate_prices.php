<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CratePrices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table){			
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('licence_id')->unsigned();
			
			$table->timestamps();
			
			$table->foreign('user_id')
				  ->references('id')->on('users')
				  ->onDelete('cascade');
			
			
			$table->foreign('licence_id')
				  ->references('id')->on('licences')
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prices');
	}

}
