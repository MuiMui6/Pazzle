php<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    //受注
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');                 //受注ID
            $table->integer('userid');                     //ユーザID
            $table->integer('itemid');                     //商品ID
            $table->integer('cnt');                        //商品数
            $table->integer('addressid');                  //宛先ID
            $table->date('paydate')->nullable();           //支払日
            $table->integer('pconfirmorid')->nullable();   //支払い確認者
            $table->date('shipdate')->nullable();          //到着日
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
        Schema::dropIfExists('orders');
    }
}
