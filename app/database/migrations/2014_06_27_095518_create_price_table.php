<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('price', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('id_user');
			$table->unsignedInteger('id_licence');			
			$table->timestamps();
			
			$table->foreign('id_user')
				->references('id')->on('user')
				->onDelete('cascade');
			
			$table->foreign('id_licence')
				->references('id')->on('licence')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('price');
	}

}
