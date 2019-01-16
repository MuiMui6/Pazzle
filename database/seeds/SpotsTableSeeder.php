<?php

use Illuminate\Database\Seeder;
use App\Spot;

class SpotsTableSeeder extends Seeder
{
    public function run()
    {

        //
        Spot::create([
            'name' => '大阪情報コンピュータ専門学校',
            'profile' => '略称”OIC”。大阪府大阪市天王寺区にあるIT・ゲーム・デザインの３つの学科がある。',
            'createrid' => random_int('1','480')
        ]);


        //nifureru
        Spot::create([
            'name' => 'nifureru水族館',
            'profile' => '大阪府吹田市にあるnifureru水族館。カビバラさんがいます！',
            'createrid' => random_int('1','480')
        ]);


        //
        Spot::create([
            'name' => '京都四条通',
            'profile' => '京都にある四条通。突当りには八坂神社があり、７月には祇園祭で大勢の人でにぎわいます。',
            'createrid' => random_int('1','480')
        ]);


        //
        Spot::create([
            'name' => '出雲大社',
            'profile' => '島根県にある出雲大社です。TVなどでよく移されるあの建物は本堂じゃないです……。',
            'createrid' => random_int('1','480')
        ]);

        //
        Spot::create([
            'name' => '明治神宮',
            'profile' => '東京にある明治神宮です。大きい！',
            'createrid' => random_int('1','480')
        ]);

        //
        for ($i = 0; $i <= 100; $i++) {
            Spot::create([
                'name' => 'spot' . $i,
                'profile' => 'Spot' . $i . 'です。',
                'createrid' => random_int('1','480')
            ]);
        }
    }
}
