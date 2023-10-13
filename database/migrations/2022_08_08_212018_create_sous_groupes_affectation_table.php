<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSousGroupesAffectationTable extends Migration {

	public function up()
	{
		Schema::create('sous_groupes_affectation', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('sous_groupe_id')->unsigned();
			$table->bigInteger('etudiant_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sous_groupes_affectation');
	}
}