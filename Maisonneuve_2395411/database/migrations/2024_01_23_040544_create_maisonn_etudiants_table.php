<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonnEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisonn_etudiants', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->date('birthday');
            $table->timestamps();

            // FK
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('maisonn_villes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maisonn_etudiants');
    }
}
