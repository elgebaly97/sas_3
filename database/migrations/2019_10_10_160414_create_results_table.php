<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultsTable extends Migration {

	public function up()
	{
		Schema::create('results', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('result');
			$table->string('grade');
			$table->integer('student_id');
			$table->integer('subject_id');
		});
	}

	public function down()
	{
		Schema::drop('results');
	}
}