<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilieresTable extends Migration {

	public function up()
	{
		Schema::create('filieres', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('type_filiere_id')->unsigned();
			$table->bigInteger('departement_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('filieres');
	}
}