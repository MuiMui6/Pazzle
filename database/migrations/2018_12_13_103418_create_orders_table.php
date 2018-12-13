<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    //受注
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orderid');
            $table->integer('userid');
            $table->integer('itemid');
            $table->integer('cnt');
            $table->integer('addressid');
            $table->date('paydate')->nullable();
            $table->integer('pconfirmorid')->nullable();
            $table->date('shipdate')->nullable();
            $table->integer('sconfirmorid')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
