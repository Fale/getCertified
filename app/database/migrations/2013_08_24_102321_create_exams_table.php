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
		    $table->string('fullname');
		    $table->string('slug');
		    $table->integer('provider_id')->unsigned();
		    $table->text('description');
		    $table->date('last_version');
		    $table->date('introduction');
		    $table->date('retired');

		    $table->foreign('provider_id')->references('id')->on('providers');
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