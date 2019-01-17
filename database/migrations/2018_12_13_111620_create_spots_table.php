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
            $table->string('url')->nullable();             //URL
            $table->text('address')->nullable();           //住所
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
