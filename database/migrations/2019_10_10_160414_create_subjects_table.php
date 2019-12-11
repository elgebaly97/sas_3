<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('grade_id');
            $table->integer('term_id');
            $table->integer('professor_id');
            $table->integer('department_id');

		});
	}

	public function down()
	{
		Schema::drop('subjects');
	}
}