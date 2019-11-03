<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarksTable extends Migration {

	public function up()
	{
		Schema::create('marks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('subject_id');
			$table->integer('attendance');
			$table->integer('midterm');
			$table->integer('semester');
		});
	}

	public function down()
	{
		Schema::drop('marks');
	}
}