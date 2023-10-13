<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeSousGroupesTable extends Migration {

	public function up()
	{
		Schema::create('type_sous_groupes', function(Blueprint $table) {
			$table->id();
			$table->string('libelle');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('type_sous_groupes');
	}
}