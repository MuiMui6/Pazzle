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
            $table->increments('itemid');               //商品ID
            $table->string('name');                     //商品名
            $table->text('profile');                    //紹介文
            $table->integer('price');                   //金額
            $table->integer('tag1')->nullable();                    //タグ１
            $table->integer('tag2')->nullable();        //タグ２
            $table->integer('tag3')->nullable();        //タグ３
            $table->integer('sizeid')->nullable();                  //サイズ
            $table->integer('peasid')->nullable();                 //peas数
            $table->integer('spotid')->nullable();                  //観光情報
            $table->boolean('view')->default(0);  //可視か不可視か（基本不可視）
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
        Schema::dropIfExists('items');
    }
}
