<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('from');
			$table->dateTime('to');
			$table->unsignedInteger('id_user');
			$table->unsignedInteger('id_instructor')->nullable();
			$table->unsignedInteger('id_school');
			$table->unsignedInteger('id_vehicle')->nullable();
			$table->unsignedInteger('id_licence')->nullable();			
			$table->timestamps();
			
			$table->foreign('id_user')
				->references('id')->on('user')
				->onDelete('cascade');
			
			$table->foreign('id_instructor')
				->references('id')->on('user')
				->onDelete('set null');
			
			$table->foreign('id_school')
				->references('id')->on('school')
				->onDelete('cascade');
			
			$table->foreign('id_vehicle')
				->references('id')->on('vehicle')
				->onDelete('set null');
			
			$table->foreign('id_licence')
				->references('id')->on('licence')
				->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservation');
	}

}
