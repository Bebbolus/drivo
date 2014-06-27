<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTraining extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trainings', function(Blueprint $table){			
			$table->increments('id');
	
			$table->integer('user_id')->unsigned();
			$table->integer('licence_id')->unsigned();
			$table->integer('vehicle_id')->unsigned();
			$table->integer('school_id')->unsigned();
			$table->timestamp('start_at');
			$table->timestamp('end_at');
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
		Schema::drop('trainings');
	}

}
