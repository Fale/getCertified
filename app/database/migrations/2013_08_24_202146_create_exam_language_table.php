<?php

use Illuminate\Database\Migrations\Migration;

class CreateExamLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exam_language', function($table)
		{
		    $table->integer('exam_id')->unsigned();
		    $table->integer('language_id')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('exam_language');
	}

}