<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCommentsTable extends Migration
{
    //商品コメント
    public function up()
    {
        Schema::create('item_comments', function (Blueprint $table) {
            $table->integer('itemid');                  //商品ID
            $table->integer('userid');                  //ユーザID
            $table->integer('evaluation');              //評価
            $table->text('comment');                    //コメント
            $table->boolean('view')->default(1);  //可視・不可視
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
        Schema::dropIfExists('item_comments');
    }
}
