<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentsTable extends Migration {

	public function up()
	{
		Schema::create('assignments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('professor_id');
			$table->integer('grade_id');
		});
	}

	public function down()
	{
		Schema::drop('assignments');
	}
}