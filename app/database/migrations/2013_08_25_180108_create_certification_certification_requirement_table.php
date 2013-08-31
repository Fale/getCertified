<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationCertificationRequirementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certification_certification_requirement', function($table)
		{
		    $table->integer('certification_id')->unsigned();
		    $table->integer('required_id')->unsigned();
		    $table->integer('group_id')->unsigned();

		    $table->foreign('certification_id')->references('id')->on('certifications');
		    $table->foreign('required_id')->references('id')->on('certifications');
		    $table->foreign('group_id')->references('id')->on('certification_group_requirement');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('certification_certification_requirement');
	}

}