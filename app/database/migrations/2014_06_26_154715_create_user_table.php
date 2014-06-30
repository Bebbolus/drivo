<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('name');
			$table->string('surname');
			$table->string('fiscal_code');	
			$table->string('phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->string('email')->unique();
			$table->string('group')->nullable();
			$table->string('username')->unique();
			$table->string('password');
			$table->string('remember_token')->nullable();
			
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
		Schema::drop('user');
	}

}
