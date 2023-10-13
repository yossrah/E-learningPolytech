<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesFilieresTable extends Migration {

	public function up()
	{
		Schema::create('types_filieres', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('types_filieres');
	}
}