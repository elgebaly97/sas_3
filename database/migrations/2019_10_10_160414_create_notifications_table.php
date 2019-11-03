<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->integer('assignment_id');
			$table->integer('result_id');
			$table->text('content');
			$table->integer('post_id');
			$table->integer('mark_id');
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}