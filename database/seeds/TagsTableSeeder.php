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
            'name' => '未定',
            'createrid'=>'1'
        ]);

        //パズル
        Tag::create([
            'name' => 'パズル',
            'createrid'=>'1'
        ]);

        //道具
        Tag::create([
            'name' => '道具',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '水族館',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '生き物',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => 'イルミネーション',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '置物',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => 'イベント',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '寺・神社',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '空',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '春',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '夏',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '秋',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '冬',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '大阪府',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '京都府',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '東京都',
            'createrid'=>'1'
        ]);

        //
        Tag::create([
            'name' => '島根県',
            'createrid'=>'1'
        ]);
    }
}
