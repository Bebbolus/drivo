<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAbilitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_abilitations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('id_user');
			$table->unsignedInteger('id_licence');
			$table->timestamps();
			
			$table->foreign('id_user')
				->references('id')->on('users')
				->onDelete('cascade');
			
			$table->foreign('id_licence')
				->references('id')->on('licences')
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
		Schema::drop('user_abilitations');
	}

}
