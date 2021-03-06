<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversationsTable extends Migration {

	public function up()
	{
		Schema::create('conversations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_id');
			$table->integer('professor_id');
			$table->integer('group_id');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('conversations');
	}
}