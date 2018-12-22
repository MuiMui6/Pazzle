<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //未定
        Tag::create([
            'name' => '未定'
        ]);

        //パズル
        Tag::create([
            'name' => 'パズル'
        ]);

        //道具
        Tag::create([
            'name' => '道具'
        ]);

        //
        Tag::create([
            'name' => '水族館'
        ]);

        //
        Tag::create([
            'name' => '生き物'
        ]);

        //
        Tag::create([
            'name' => 'イルミネーション'
        ]);

        //
        Tag::create([
            'name' => '置物'
        ]);

        //
        Tag::create([
            'name' => 'イベント'
        ]);

        //
        Tag::create([
            'name' => '寺・神社'
        ]);

        //
        Tag::create([
            'name' => '空'
        ]);

        //
        Tag::create([
            'name' => '春'
        ]);

        //
        Tag::create([
            'name' => '夏'
        ]);

        //
        Tag::create([
            'name' => '秋'
        ]);

        //
        Tag::create([
            'name' => '冬'
        ]);

        //
        Tag::create([
            'name' => '大阪府'
        ]);

        //
        Tag::create([
            'name' => '京都府'
        ]);

        //
        Tag::create([
            'name' => '東京都'
        ]);

        //
        Tag::create([
            'name' => '島根県'
        ]);
    }
}
