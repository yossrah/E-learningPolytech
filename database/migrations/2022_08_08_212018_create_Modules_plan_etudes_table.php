<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesPlanEtudesTable extends Migration {

	public function up()
	{
		Schema::create('Modules_plan_etudes', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->bigInteger('plan_etude_id')->unsigned();
			$table->string('coefficient', 70);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Modules_plan_etudes');
	}
}