<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');               //商品ID
            $table->string('name');                     //商品名
            $table->text('profile');                    //紹介文
            $table->integer('price');                   //金額
            $table->integer('sizeid');                  //サイズ
            $table->integer('peasid');                  //peas数
            $table->string('image')->nullable();        //Image画像
            $table->boolean('view')->default(0);  //可視か不可視か（基本不可視）
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
        Schema::dropIfExists('items');
    }
}
