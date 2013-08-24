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
		    $table->string('slug');
		    $table->integer('provider_id')->unsigned();
		    $table->text('description');
		    $table->string('level');
		    $table->date('last_version');
		    $table->date('validity');

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
		Schema::dropIfExists('certifications');
	}

}