<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    //タグ
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tagid');                //タグID
            $table->string('name');                     //タグ名
            $table->text('etc')->nullable();            //メモ
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
        Schema::dropIfExists('tags');
    }
}
