<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableCertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_certifs', function (Blueprint $table) {
            $table->id();
            $table->string('date_débutaffectation',70);
            $table->string('date_finaffectation',70);
            $table->string('valide',70);
            $table->bigInteger('certifs_id')->unsigned();//has Certif
            $table->bigInteger('user_id')->unsigned();//belongs to user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable_certifs');
    }
}
