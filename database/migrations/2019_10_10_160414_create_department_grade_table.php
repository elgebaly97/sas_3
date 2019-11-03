<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentGradeTable extends Migration {

	public function up()
	{
		Schema::create('department_grade', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('department_id');
			$table->integer('grade_id');
		});
	}

	public function down()
	{
		Schema::drop('department_grade');
	}
}