<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->increments('id');                  //観光地
            $table->string('name');                        //観光地名
            $table->text('article');                       //紹介文
            $table->integer('post')->nullable();           //〒
            $table->string('add1')->nullable();            //
            $table->string('add2')->nullable();            //
            $table->boolean('view')->default('1');   //可視
            $table->string('url')->nullable();             //URL
            $table->text('tel')->nullable();               //TEL
            $table->string('image')->nullable();           //画像名
            $table->string('tag1')->nullable();         //タグ1
            $table->string('tag2')->nullable();         //タグ2
            $table->string('tag3')->nullable();         //タグ3
            $table->integer('createrid');                  //作成者
            $table->integer('updaterid')->nullable();      //更新者
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
        Schema::dropIfExists('spots');
    }
}
