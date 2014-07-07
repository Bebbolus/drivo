<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
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
				->references('id')->on('schools')
				->onDelete('cascade');
			
			$table->foreign('id_address')
				->references('id')->on('addresses')
				->onDelete('set null');
			
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
		Schema::drop('vehicles');
	}

}
