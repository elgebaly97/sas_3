<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupProfessorTable extends Migration {

	public function up()
	{
		Schema::create('group_professor', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('professor_id');
			$table->integer('group_id');
		});
	}

	public function down()
	{
		Schema::drop('group_professor');
	}
}