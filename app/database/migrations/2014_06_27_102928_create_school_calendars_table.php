<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolCalendarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_calendars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('from');
			$table->dateTime('to');
			$table->unsignedInteger('id_school');
			$table->unsignedInteger('id_status');
			$table->timestamps();
			
			$table->foreign('id_school')
				->references('id')->on('schools')
				->onDelete('cascade');
				
			$table->foreign('id_status')
				->references('id')->on('status_calendars')
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
		Schema::drop('school_calendars');
	}

}
