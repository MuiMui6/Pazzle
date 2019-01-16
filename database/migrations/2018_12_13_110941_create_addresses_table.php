<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    //住所
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('addressid');            //住所ID
            $table->integer('userid');                  //ユーザID
            $table->string('toname')->nullable();       //宛先名
            $table->string('post');                    //郵便番号
            $table->string('add1');                     //都道府県市区町村
            $table->string('add2');                     //番地マンション名
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
        Schema::dropIfExists('addresses');
    }
}
