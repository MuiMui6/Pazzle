<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    //サイズ
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('sizeid');               //サイズID
            $table->integer('height');                  //縦
            $table->integer('width');                   //横
            $table->integer('createrid');               //作成者
            $table->integer('updaterid')->nullable();   //更新者
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
        Schema::dropIfExists('sizes');
    }
}
