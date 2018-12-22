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
        //A全
        Size::create([
            'height' => '1188', //縦
            'width' => '841',   //横
            'createrid' => '1', //作成者
            'etc' => 'A0'       //メモ
        ]);

        //A1
        Size::create([
            'height' => '841',  //縦
            'width' => '594',   //横
            'createrid' => '1', //作成者
            'etc' => 'A1'       //メモ
        ]);

        //A2
        Size::create([
            'height' => '594',  //縦
            'width' => '420',   //横
            'createrid' => '1', //作成者
            'etc' => 'A2'       //メモ
        ]);

        //A3
        Size::create([
            'height' => '420',  //縦
            'width' => '297',   //横
            'createrid' => '1', //作成者
            'etc' => 'A3'       //メモ
        ]);

        //A4
        Size::create([
            'height' => '297',  //縦
            'width' => '210',   //横
            'createrid' => '1', //作成者
            'etc' => 'A4'       //メモ
        ]);

        //A5
        Size::create([
            'height' => '210',  //縦
            'width' => '148',   //横
            'createrid' => '1', //作成者
            'etc' => 'A5'       //メモ
        ]);

        //B0
        Size::create([
            'height' => '1456', //縦
            'width' => '1030',  //横
            'createrid' => '1', //作成者
            'etc' => 'B0'       //メモ
        ]);

        //B1
        Size::create([
            'height' => '1030', //縦
            'width' => '728',   //横
            'createrid' => '1', //作成者
            'etc' => 'B1'       //メモ
        ]);

        //B2
        Size::create([
            'height' => '728',  //縦
            'width' => '515',   //横
            'createrid' => '1', //作成者
            'etc' => 'B2'       //メモ
        ]);

        //B3
        Size::create([
            'height' => '515',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
            'etc' => 'B3'       //メモ
        ]);

        //
        Size::create([
            'height' => '364',  //縦
            'width' => '364',   //横
            'createrid' => '1', //作成者
            'etc' => 'B4'       //メモ
        ]);

        //
        Size::create([
            'height' => '257',  //縦
            'width' => '182',   //横,
            'createrid' => '1', //作成者
            'etc' => 'B5'       //メモ
        ]);
    }
}
