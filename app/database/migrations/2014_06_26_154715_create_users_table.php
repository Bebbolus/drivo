<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('email')->unique();
			$table->string('group')->nullable();
			$table->string('username')->unique();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->unsignedInteger('id_school')->nullable();		

			$table->foreign('id_school')
			->references('id')->on('schools')
			->onDelete('cascade');
			
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
		Schema::drop('users');
	}

}
