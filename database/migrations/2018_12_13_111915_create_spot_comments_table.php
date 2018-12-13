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
            $table->integer('spotid');
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
        Schema::dropIfExists('spot_comments');
    }
}
