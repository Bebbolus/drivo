<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('id_instructor');
			$table->unsignedInteger('id_licence');			
			$table->timestamps();
			
			$table->foreign('id_instructor')
				->references('id')->on('instructors')
				->onDelete('cascade');
			
			$table->foreign('id_licence')
				->references('id')->on('licences')
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
		Schema::drop('prices');
	}

}
