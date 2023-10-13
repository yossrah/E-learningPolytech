<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasseportEtudiantsTable extends Migration {

	public function up()
	{
		Schema::create('passeport_etudiants', function(Blueprint $table) {
			$table->id();
			$table->string('numero', 70);
			$table->string('date_passeport', 70);
			$table->bigInteger('etudiant_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('passeport_etudiants');
	}
}