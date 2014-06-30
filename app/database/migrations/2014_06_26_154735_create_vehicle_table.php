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
			$table->string('type', 50)->nullable();
			$table->string('brand', 50)->nullable();
			$table->string('model', 50)->nullable();
			$table->tinyInteger('fuel')->nullable();
			$table->string('engine_size', 50)->nullable();
			$table->smallInteger('power')->nullable();
			$table->string('licence_number', 10)->nullable();
			$table->date('registration_date')->nullable();
			$table->boolean('trailer')->nullable();
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
