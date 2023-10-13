<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSousGroupesTable extends Migration {

	public function up()
	{
		Schema::create('sous_groupes', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->string('list_groupe');
			$table->bigInteger('type_sous_groupe_id')->unsigned();
			$table->bigInteger('niveau_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sous_groupes');
	}
}