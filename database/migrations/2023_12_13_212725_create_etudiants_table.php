<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('name', 45);
            $table->string('address', 100);
            $table->string('phone', 25);
            $table->string('email', 45)->unique()->nullable($value = false);
            $table->date('birthday');
            $table->unsignedInteger('ville_id');

            // Contrainte pour la FK
            $table->foreign('ville_id')->references('id')->on('villes');
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
