<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certifications', function($table)
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
		Schema::dropIfExists('certifications');
	}

}