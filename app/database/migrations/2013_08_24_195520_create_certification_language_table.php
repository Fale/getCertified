<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certification_language', function($table)
		{
		    $table->integer('certification_id')->unsigned();
		    $table->integer('language_id')->unsigned();

		    $table->foreign('certification_id')->references('id')->on('certifications');
		    $table->foreign('language_id')->references('id')->on('languages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('certification_language');
	}

}