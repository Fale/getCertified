<?php

use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->string('identifier');
		    $table->integer('provider')->unsigned();
		    $table->text('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('exams');
	}
}