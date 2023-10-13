<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNiveauxTable extends Migration {

	public function up()
	{
		Schema::create('niveaux', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('filiere_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('niveaux');
	}
}