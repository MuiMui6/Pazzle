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
            $table->increments('addressid');
            $table->integer('userid');
            $table->string('toname')->nullable();
            $table->integer('post');
            $table->string('add1');
            $table->string('add2');
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
        Schema::dropIfExists('addresses');
    }
}
