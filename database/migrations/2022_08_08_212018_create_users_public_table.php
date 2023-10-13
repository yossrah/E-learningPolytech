<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersPublicTable extends Migration {

	public function up()
	{
		Schema::create('users_public', function(Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->string('role_public');
			$table->bigInteger('profile_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users_public');
	}
}