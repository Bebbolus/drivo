<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transfer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('id_vehicle');
			$table->unsignedInteger('from');
			$table->unsignedInteger('to');
			$table->integer('time');
			$table->timestamps();
			
			$table->foreign('id_vehicle')
				->references('id')->on('vehicle')
				->onDelete('cascade');
			
			$table->foreign('from')
				->references('id')->on('address')
				->onDelete('cascade');
			
			$table->foreign('to')
				->references('id')->on('address')
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
		Schema::drop('transfer');
	}

}
