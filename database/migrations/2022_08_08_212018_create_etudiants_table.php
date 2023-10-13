<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtudiantsTable extends Migration {

	public function up()
	{
		Schema::create('etudiants', function(Blueprint $table) {
			$table->id();
			$table->string('nom', 70);
			$table->string('prenom', 70);
			$table->string('cin', 70);
			$table->string('email_personnel', 70);
			$table->string('telephone', 70);
			$table->string('naissance');
			$table->string('bac', 70);
			$table->string('annee_bac', 70);
			$table->string('lycee_bac', 70);
			$table->string('mention_bac', 70);
			$table->string('email_polytechnique', 70);
			$table->string('matricule', 70)->default('Nan');
			$table->string('ville', 70);
			$table->string('adresse');
			$table->bigInteger('filiere_id')->unsigned();
			$table->bigInteger('niveau_id')->unsigned();
			$table->bigInteger('groupe_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('etudiants');
	}
}