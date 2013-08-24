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

		    $table->foreign('exam_id')->references('id')->on('exams');
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
		Schema::dropIfExists('exam_language');
	}

}