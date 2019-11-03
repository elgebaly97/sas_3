<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfessorsTable extends Migration {

	public function up()
	{
		Schema::create('professors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->bigInteger('national_id');
			$table->integer('faculty_id');
			$table->integer('department_id');
			$table->integer('grade_id');
            $table->string('api_token', 60)->unique()->nullable();
            $table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('professors');
	}
}