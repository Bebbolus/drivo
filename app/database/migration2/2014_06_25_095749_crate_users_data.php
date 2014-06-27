<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateUsersData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_data', function(Blueprint $table){			
			$table->increments('id');
	
			$table->integer('user_id')->unsigned();
			
			$table->string('fiscal_code');	
			$table->string('phone');
			$table->string('surname');	
			
			$table->timestamps();
			
			$table->foreign('user_id')
				  ->references('id')->on('users')
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
		Schema::drop('users_data');
	}

}
