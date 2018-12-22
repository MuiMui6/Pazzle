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
            $table->increments('peasid');               //peasID
            $table->integer('cnt');                     //ピース数
            $table->text('etc')->nullable();            //メモ
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
        Schema::dropIfExists('peases');
    }
}
