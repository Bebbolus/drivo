<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instructors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('surname', 50);
			$table->string('fiscal_code');
			$table->date('date_of_birth')->nullable();
			$table->string('address', 100)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('province', 2)->nullable();
			$table->string('state', 50)->nullable();
			$table->string('zip', 5)->nullable();
			$table->string('phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->string('email')->unique();
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
		Schema::drop('instructors');
	}

}
