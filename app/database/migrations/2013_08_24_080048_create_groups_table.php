<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function($table)
		{
		    $table->increments('id');
		    $table->integer('certification_id')->unsigned();
		    $table->integer('policy');
		    $table->integer('parent_id')->unsigned();

		    $table->foreign('certification_id')->references('id')->on('certifications');
		    $table->foreign('parent_id')->references('id')->on('groups');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('groups');
	}

}