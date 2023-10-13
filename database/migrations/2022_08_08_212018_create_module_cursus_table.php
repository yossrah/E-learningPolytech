<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModuleCursusTable extends Migration {

	public function up()
	{
		Schema::create('module_cursus', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('cursus_id')->unsigned();
			$table->bigInteger('module_plan_etude_id')->unsigned();
			$table->bigInteger('semestre_id')->unsigned();
			$table->string('commentaire', 70);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('module_cursus');
	}
}