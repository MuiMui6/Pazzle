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
            'etc' => 'A0縦長'   //メモ
        ]);

        //A全横長
        Size::create([
            'height' => '841',  //縦
            'width' => '1188',  //横
            'createrid' => '1', //作成者
            'etc' => 'A0横長'   //メモ
        ]);

        //A1縦長
        Size::create([
            'height' => '841',  //縦
            'width' => '594',   //横
            'createrid' => '1', //作成者
            'etc' => 'A1縦長'   //メモ
        ]);

        //A1横長
        Size::create([
            'height' => '594',  //縦
            'width' => '841',   //横
            'createrid' => '1', //作成者
            'etc' => 'A1横長'   //メモ
        ]);

        //A2縦長
        Size::create([
            'height' => '594',  //縦
            'width' => '420',   //横
            'createrid' => '1', //作成者
            'etc' => 'A2縦長'   //メモ
        ]);

        //A2横長
        Size::create([
            'height' => '420',  //縦
            'width' => '594',   //横
            'createrid' => '1', //作成者
            'etc' => 'A2横長'   //メモ
        ]);

        //A3縦長
        Size::create([
            'height' => '420',  //縦
            'width' => '297',   //横
            'createrid' => '1', //作成者
            'etc' => 'A3縦長'   //メモ
        ]);

        //A3横長
        Size::create([
            'height' => '297',  //縦
            'width' => '420',   //横
            'createrid' => '1', //作成者
            'etc' => 'A3横長'       //メモ
        ]);

        //A4縦長
        Size::create([
            'height' => '297',  //縦
            'width' => '210',   //横
            'createrid' => '1', //作成者
            'etc' => 'A4縦長'   //メモ
        ]);

        //A4横長
        Size::create([
            'height' => '210',  //縦
            'width' => '297',   //横
            'createrid' => '1', //作成者
            'etc' => 'A4横長'   //メモ
        ]);

        //A5縦長
        Size::create([
            'height' => '210',  //縦
            'width' => '148',   //横
            'createrid' => '1', //作成者
            'etc' => 'A5縦長'   //メモ
        ]);

        //A5横長
        Size::create([
            'height' => '148',  //縦
            'width' => '210',   //横
            'createrid' => '1', //作成者
            'etc' => 'A5横長'   //メモ
        ]);

        //B0縦長
        Size::create([
            'height' => '1456', //縦
            'width' => '1030',  //横
            'createrid' => '1', //作成者
            'etc' => 'B0'       //メモ
        ]);

        //B0横長
        Size::create([
            'height' => '1030', //縦
            'width' => '1456',  //横
            'createrid' => '1', //作成者
            'etc' => 'B0'       //メモ
        ]);

        //B1
        Size::create([
            'height' => '1030', //縦
            'width' => '728',   //横
            'createrid' => '1', //作成者
            'etc' => 'B1縦長'   //メモ
        ]);

        //B1
        Size::create([
            'height' => '728',  //縦
            'width' => '1030',  //横
            'createrid' => '1', //作成者
            'etc' => 'B1横長'   //メモ
        ]);

        //B2縦長
        Size::create([
            'height' => '728',  //縦
            'width' => '515',   //横
            'createrid' => '1', //作成者
            'etc' => 'B2縦長'   //メモ
        ]);

        //B2横長
        Size::create([
            'height' => '515',  //縦
            'width' => '728',   //横
            'createrid' => '1', //作成者
            'etc' => 'B2横長'   //メモ
        ]);

        //B3
        Size::create([
            'height' => '515',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
            'etc' => 'B3縦長'   //メモ
        ]);

        //B3
        Size::create([
            'height' => '364',  //縦
            'width' => '515',   //横
            'createrid' => '1', //作成者
            'etc' => 'B3横長'   //メモ
        ]);

        //B4縦長
        Size::create([
            'height' => '364',  //縦
            'width' => '257',   //横
            'createrid' => '1', //作成者
            'etc' => 'B4縦長'   //メモ
        ]);

        //B4横長
        Size::create([
            'height' => '257',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
            'etc' => 'B4横長'   //メモ
        ]);

        //B5縦長
        Size::create([
            'height' => '257',  //縦
            'width' => '182',   //横,
            'createrid' => '1', //作成者
            'etc' => 'B5縦長'   //メモ
        ]);

        //B5横長
        Size::create([
            'height' => '182',  //縦
            'width' => '257',   //横,
            'createrid' => '1', //作成者
            'etc' => 'B5横長'   //メモ
        ]);
    }
}
