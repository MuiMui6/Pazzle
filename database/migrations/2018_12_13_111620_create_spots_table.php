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
            $table->increments('spotid');                  //観光地
            $table->string('name');                        //観光地名
            $table->text('profile');                       //紹介文
            $table->integer('tag1')->default('1');   //タグ
            $table->integer('tag2')->nullable();           //
            $table->integer('tag3')->nullable();           //
            $table->integer('post')->nullable();           //〒
            $table->string('add1')->nullable();            //
            $table->string('add2')->nullable();            //
            $table->boolean('view')->default('1');   //可視
            $table->string('url')->nullable();             //URL
            $table->text('tel')->nullable();               //TEL
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
