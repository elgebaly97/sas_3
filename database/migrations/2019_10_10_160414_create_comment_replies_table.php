<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentRepliesTable extends Migration {

	public function up()
	{
		Schema::create('comment_replies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('comment_id');
			$table->text('body');
			$table->string('email');
		});
	}

	public function down()
	{
		Schema::drop('comment_replies');
	}
}