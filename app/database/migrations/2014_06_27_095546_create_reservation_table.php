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
		Schema::create('reservations', function(Blueprint $table)
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
				->references('id')->on('users')
				->onDelete('cascade');
			
			$table->foreign('id_instructor')
				->references('id')->on('users')
				->onDelete('set null');
			
			$table->foreign('id_school')
				->references('id')->on('schools')
				->onDelete('cascade');
			
			$table->foreign('id_vehicle')
				->references('id')->on('vehicles')
				->onDelete('set null');
			
			$table->foreign('id_licence')
				->references('id')->on('licences')
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
		Schema::drop('reservations');
	}

}
