<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcolesTable extends Migration {

	public function up()
	{
		Schema::create('ecoles', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ecoles');
	}
}