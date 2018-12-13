<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeasesTable extends Migration
{
    //peas数
    public function up()
    {
        Schema::create('peases', function (Blueprint $table) {
            $table->increments('peasid');
            $table->integer('cnt');
            $table->text('etc')->nullable();
            $table->integer('updaterid')->nullable();
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
        Schema::dropIfExists('peases');
    }
}
