<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 50);
			$table->string('brand', 50);
			$table->string('model', 50);
			$table->tinyInteger('fuel');
			$table->string('engine_size', 50);
			$table->smallInteger('power');
			$table->string('licence_number', 10);
			$table->date('registration_date');
			$table->boolean('trailer');
			$table->unsignedInteger('id_school');
			$table->unsignedInteger('id_address')->nullable();
			
			$table->foreign('id_school')
				->references('id')->on('school')
				->onDelete('cascade');
			
			$table->foreign('id_address')
				->references('id')->on('address')
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
		Schema::drop('vehicle');
	}

}
