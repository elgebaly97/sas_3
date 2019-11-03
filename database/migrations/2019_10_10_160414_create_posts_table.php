<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_id');
			$table->integer('professor_id');
			$table->string('title');
			$table->text('body');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}