<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationExamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certification_exam', function($table)
		{
		    $table->integer('certification_id')->unsigned();
		    $table->integer('exam_id')->unsigned();

		    $table->foreign('certification_id')->references('id')->on('certifications');
		    $table->foreign('exam_id')->references('id')->on('exams');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('certification_exam');
	}

}