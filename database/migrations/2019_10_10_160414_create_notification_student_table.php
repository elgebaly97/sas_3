<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationStudentTable extends Migration {

	public function up()
	{
		Schema::create('notification_student', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('notification_id');
			$table->integer('student_id');
		});
	}

	public function down()
	{
		Schema::drop('notification_student');
	}
}