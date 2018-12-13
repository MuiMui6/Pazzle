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
            $table->integer('itemid');
            $table->integer('userid');
            $table->integer('rank');
            $table->text('comment');
            $table->boolean('view')->default(0);
            $table->text('etc')->nullable();
            $table->integer('updaterid')->nullable();
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
