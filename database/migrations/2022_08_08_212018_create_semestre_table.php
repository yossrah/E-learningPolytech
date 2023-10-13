<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSemestreTable extends Migration {

	public function up()
	{
		Schema::create('semestre', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('semestre');
	}
}