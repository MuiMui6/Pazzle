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
            'article' => '略称”OIC”。大阪府大阪市天王寺区にあるIT・ゲーム・デザインの３つの学科がある。',
            'createrid' => '1'
        ]);


        //nifureru
        Spot::create([
            'name' => 'nifureru水族館',
            'article' => '大阪府吹田市にあるnifureru水族館。カビバラさんがいます！',
            'createrid' => random_int('1','480')
        ]);


        //
        Spot::create([
            'name' => '京都四条通',
            'article' => '京都にある四条通。突当りには八坂神社があり、７月には祇園祭で大勢の人でにぎわいます。',
            'createrid' => random_int('1','480')
        ]);


        //
        Spot::create([
            'name' => '出雲大社',
            'article' => '島根県にある出雲大社です。TVなどでよく移されるあの建物は本堂じゃないです……。',
            'createrid' => random_int('1','480')
        ]);

        //
        Spot::create([
            'name' => '明治神宮',
            'article' => '東京にある明治神宮です。大きい！',
            'createrid' => random_int('1','480')
        ]);

        //
        for ($i = 0; $i <= 100; $i++) {
            Spot::create([
                'name' => 'spot' . $i,
                'article' => 'Spot' . $i . 'です。',
                'createrid' => random_int('1','480')
            ]);
        }
    }
}
