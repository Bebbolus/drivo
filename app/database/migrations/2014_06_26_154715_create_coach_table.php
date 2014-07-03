<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->unsignedInteger('id_users')->nullable();
			$table->unsignedInteger('id_school')->nullable();
			$table->string('name');
			$table->string('surname');
			$table->string('fiscal_code');	
			$table->string('phone')->nullable();
			$table->string('mobile_phone')->nullable();
			
			$table->timestamps();
			
			
			$table->foreign('id_user')
				->references('id')->on('users')
				
			$table->foreign('id_school')
				->references('id')->on('schools')	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
