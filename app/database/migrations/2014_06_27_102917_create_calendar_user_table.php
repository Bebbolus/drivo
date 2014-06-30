<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('from');
			$table->dateTime('to');
			$table->unsignedInteger('id_user');
			$table->unsignedInteger('id_status');
			$table->timestamps();
			
			$table->foreign('id_user')
				->references('id')->on('users')
				->onDelete('cascade');
				
			$table->foreign('id_status')
				->references('id')->on('calendar_statuses')
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
		Schema::drop('calendar_users');
	}

}
