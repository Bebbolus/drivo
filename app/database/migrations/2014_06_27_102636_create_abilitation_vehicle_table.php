<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitationVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abilitation_vehicles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('id_vehicle');
			$table->unsignedInteger('id_licence');
			$table->timestamps();
			
			$table->foreign('id_vehicle')
				->references('id')->on('vehicles')
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
		Schema::drop('abilitation_vehicles');
	}

}
