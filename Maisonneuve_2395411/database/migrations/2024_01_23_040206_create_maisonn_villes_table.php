<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonnVillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisonn_villes', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            
            // $table->increments('id');
            $table->id();
            $table->string('name')->unique()->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
