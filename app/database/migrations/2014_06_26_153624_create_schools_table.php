<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function($table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('email', 50);
			$table->string('phone', 50);
			$table->string('fax', 50);
			$table->unsignedInteger('id_consortium');
			$table->unsignedInteger('id_address');
			
			$table->foreign('id_consortium')
				  ->references('id')->on('schools')
				  ->onDelete('cascade');
			
			$table->foreign('id_address')
				->references('id')->on('addresses')
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
		Schema::drop('schools');
	}

}
