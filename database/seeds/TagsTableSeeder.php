<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //タグ作成
        //共通都道府県
        Tag::create([
            'name' => '大阪府',
            'genre' => '3',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '京都府',
            'genre' => '3',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '島根県',
            'genre' => '3',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '東京都',
            'genre' => '3',
            'createrid'=>'1'
        ]);


        //パズル
        Tag::create([
            'name' => 'パズル',
            'genre' => '1',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => 'フレーム',
            'genre' => '1',
            'createrid'=>'1'
        ]);


        //旅行
        Tag::create([
            'name' => '神社',
            'genre' => '2',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '寺',
            'genre' => '2',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '大社',
            'genre' => '2',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => '遊園地・水族館',
            'genre' => '2',
            'createrid'=>'1'
        ]);
        Tag::create([
            'name' => 'イベント',
            'genre' => '2',
            'createrid'=>'1'
        ]);

    }
}
