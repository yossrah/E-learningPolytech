<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParentsTable extends Migration {

	public function up()
	{
		Schema::create('parents', function(Blueprint $table) {
			$table->id();
			$table->string('nom', 70);
			$table->string('prenom', 70);
			$table->string('cin', 70);
			$table->string('naissance');
			$table->string('email_personnel', 70);
			$table->string('telephone');
			$table->bigInteger('etudiant_id')->unsigned();
			$table->string('ville', 70);
			$table->string('adresse');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('parents');
	}
}