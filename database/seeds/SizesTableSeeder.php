<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //A全縦長
        Size::create([
            'height' => '1188', //縦
            'width' => '841',   //横
            'createrid' => '1', //作成者
        ]);

        //A全横長
        Size::create([
            'height' => '841',  //縦
            'width' => '1188',  //横
            'createrid' => '1', //作成者
        ]);

        //A1縦長
        Size::create([
            'height' => '841',  //縦
            'width' => '594',   //横
            'createrid' => '1', //作成者
        ]);

        //A1横長
        Size::create([
            'height' => '594',  //縦
            'width' => '841',   //横
            'createrid' => '1', //作成者
        ]);

        //A2縦長
        Size::create([
            'height' => '594',  //縦
            'width' => '420',   //横
            'createrid' => '1', //作成者
        ]);

        //A2横長
        Size::create([
            'height' => '420',  //縦
            'width' => '594',   //横
            'createrid' => '1', //作成者
        ]);

        //A3縦長
        Size::create([
            'height' => '420',  //縦
            'width' => '297',   //横
            'createrid' => '1', //作成者
        ]);

        //A3横長
        Size::create([
            'height' => '297',  //縦
            'width' => '420',   //横
            'createrid' => '1', //作成者
        ]);

        //A4縦長
        Size::create([
            'height' => '297',  //縦
            'width' => '210',   //横
            'createrid' => '1', //作成者
        ]);

        //A4横長
        Size::create([
            'height' => '210',  //縦
            'width' => '297',   //横
            'createrid' => '1', //作成者
        ]);

        //A5縦長
        Size::create([
            'height' => '210',  //縦
            'width' => '148',   //横
            'createrid' => '1', //作成者
        ]);

        //A5横長
        Size::create([
            'height' => '148',  //縦
            'width' => '210',   //横
            'createrid' => '1', //作成者
        ]);

        //B0縦長
        Size::create([
            'height' => '1456', //縦
            'width' => '1030',  //横
            'createrid' => '1', //作成者
        ]);

        //B0横長
        Size::create([
            'height' => '1030', //縦
            'width' => '1456',  //横
            'createrid' => '1', //作成者
        ]);

        //B1
        Size::create([
            'height' => '1030', //縦
            'width' => '728',   //横
            'createrid' => '1', //作成者
        ]);

        //B1
        Size::create([
            'height' => '728',  //縦
            'width' => '1030',  //横
            'createrid' => '1', //作成者
        ]);

        //B2縦長
        Size::create([
            'height' => '728',  //縦
            'width' => '515',   //横
            'createrid' => '1', //作成者
        ]);

        //B2横長
        Size::create([
            'height' => '515',  //縦
            'width' => '728',   //横
            'createrid' => '1', //作成者
        ]);

        //B3
        Size::create([
            'height' => '515',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
        ]);

        //B3
        Size::create([
            'height' => '364',  //縦
            'width' => '515',   //横
            'createrid' => '1', //作成者
        ]);

        //B4縦長
        Size::create([
            'height' => '364',  //縦
            'width' => '257',   //横
            'createrid' => '1', //作成者
        ]);

        //B4横長
        Size::create([
            'height' => '257',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
        ]);

        //B5縦長
        Size::create([
            'height' => '257',  //縦
            'width' => '182',   //横,
            'createrid' => '1', //作成者
        ]);

        //B5横長
        Size::create([
            'height' => '182',  //縦
            'width' => '257',   //横,
            'createrid' => '1', //作成者
        ]);
    }
}
