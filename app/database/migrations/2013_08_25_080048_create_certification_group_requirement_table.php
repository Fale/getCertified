<?php

use Illuminate\Database\Migrations\Migration;

class CreateCertificationGroupRequirementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('certification_group_requirement', function($table)
		{
		    $table->increments('id');
		    $table->integer('policy');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('certification_group_requirement');
	}

}