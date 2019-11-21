<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password')->nullable();
			$table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->integer('score')->nullable();
			$table->string('national_id')->nullable();
			$table->integer('faculty_id')->nullable();
			$table->integer('department_id')->nullable();
			$table->integer('grade_id')->nullable();
			$table->integer('group_id')->nullable();
            $table->string('api_token', 60)->unique()->nullable();
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}