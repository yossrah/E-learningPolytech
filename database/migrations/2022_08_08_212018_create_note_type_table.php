<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoteTypeTable extends Migration {

	public function up()
	{

		Schema::create('note_type', function(Blueprint $table) {
			$table->id();
			$table->string('libelle', 70);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('note_type');
	}
}