<?php

use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requirements', function($table)
		{
		    $table->integer('certification_id')->unsigned();
		    $table->string('requirement_type');
		    $table->integer('requirement_id')->unsigned();
		    $table->integer('group_id')->unsigned();
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
		Schema::dropIfExists('requirements');
	}

}