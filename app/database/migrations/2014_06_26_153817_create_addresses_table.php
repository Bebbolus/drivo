<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');			
			$table->string('address', 50);
			$table->string('city', 50);
			$table->string('province', 50);
			$table->string('state', 50);
			$table->string('zip', 5);
			$table->unsignedInteger('id_school');
			$table->timestamps();
			
			$table->foreign('id_school')
			->references('id')->on('schools')
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
		Schema::drop('addresses');
	}

}
