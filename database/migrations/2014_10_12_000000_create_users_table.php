<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            // Seront ammenés en tant que FKs
            
            $table->bigInteger('id')->unsigned();           
            $table->string('name', 45);
            $table->string('email', 45)->unique()->nullable($value = false);

            // Unique à la table users
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 50);
            $table->rememberToken();
            $table->timestamps();

            // Contrainte pour la FK
            $table->foreign('id')->references('id')->on('maisonn_etudiants');
            $table->foreign('name')->references('name')->on('maisonn_etudiants');
            $table->foreign('email')->references('email')->on('maisonn_etudiants');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
