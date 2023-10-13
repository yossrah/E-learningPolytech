<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanEtudesTable extends Migration {

	public function up()
	{
		Schema::create('plan_etudes', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->string('date_plan', 30);
			$table->bigInteger('ecole_id')->unsigned();
			$table->bigInteger('departement_id')->unsigned();
			$table->bigInteger('filiere_id')->unsigned();
			$table->bigInteger('niveau_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('plan_etudes');
	}
}