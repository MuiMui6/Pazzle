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
            $table->increments('itemid');
            $table->string('name');
            $table->text('profile');
            $table->integer('tag1');
            $table->integer('tag2')->nullable();
            $table->integer('tag3')->nullable();
            $table->integer('sizeid');
            $table->integer('peaceid');
            $table->integer('spotid');
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
        Schema::dropIfExists('items');
    }
}
