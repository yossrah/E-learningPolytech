<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartementsTable extends Migration {

	public function up()
	{
		Schema::create('departements', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('ecole_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('departements');
	}
}