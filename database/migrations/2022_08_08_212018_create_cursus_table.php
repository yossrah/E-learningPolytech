<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursusTable extends Migration {

	public function up()
	{
		Schema::create('cursus', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('plan_etude_id')->unsigned();
			$table->bigInteger('annee_universitaire_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('cursus');
	}
}