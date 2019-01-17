<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    //入庫
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('warehouseid');          //入庫ID
            $table->integer('itemid');                  //商品ID
            $table->integer('cnt');                     //仕入数
            $table->integer('createrid');               //入庫確認者
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
        Schema::dropIfExists('warehouses');
    }
}
