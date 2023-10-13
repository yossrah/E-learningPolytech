<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertifUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certif_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();//belongs to user
            $table->bigInteger('certifs_id')->unsigned();//belongs to user
            $table->bigInteger('prix_certifs')->unsigned();//belongs to user
            $table->bigInteger('annes_universitaire')->unsigned();//belongs to user
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
        Schema::dropIfExists('certif_users');
    }
}
