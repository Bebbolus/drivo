<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school', function($table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('email', 50);
			$table->string('phone', 50);
			$table->string('fax', 50);
			$table->unsignedInteger('id_consortium');
			$table->unsignedInteger('id_address');
			
			$table->foreign('id_consortium')
				  ->references('id')->on('school')
				  ->onDelete('cascade');
			
			$table->foreign('id_address')
				->references('id')->on('address')
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
		Schema::drop('school');
	}

}
