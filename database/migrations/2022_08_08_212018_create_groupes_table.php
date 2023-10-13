<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupesTable extends Migration {

	public function up()
	{
		Schema::create('groupes', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('filiere_id')->unsigned();
			$table->bigInteger('niveau_id')->unsigned();
			$table->bigInteger('typecertif_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('groupes');
	}
}