<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnesUniversitaireTable extends Migration {

	public function up()
	{
		Schema::create('annes_universitaire', function(Blueprint $table) {
			$table->id();
			$table->string('annee_universitaire', 30);
			$table->string('annee', 30);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('annes_universitaire');
	}
}