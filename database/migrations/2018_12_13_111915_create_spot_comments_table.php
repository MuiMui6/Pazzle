<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotCommentsTable extends Migration
{
    //観光地コメント
    public function up()
    {
        Schema::create('spot_comments', function (Blueprint $table) {
            $table->increments('id');                      //spotcommentid
            $table->integer('spotid');                     //観光地ID
            $table->integer('userid');                     //ユーザID
            $table->integer('evaluation');                 //評価
            $table->text('comment');                       //コメント
            $table->boolean('view')->default(1);     //可視・不可視
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
        Schema::dropIfExists('spot_comments');
    }
}
