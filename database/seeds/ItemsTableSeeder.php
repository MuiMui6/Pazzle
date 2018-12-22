<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Item::create([
            'name' => '祇園祭',
            'profile' => '2017年７月に行われた祇園祭です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => 'イルミネーション',
            'profile' => '万博記念公園のイルミネーションです。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '熊野大社',
            'profile' => '島根県にある熊野大社です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '桜の原っぱ',
            'profile' => '鶴見緑地公園にて撮影しました。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '哲学の道',
            'profile' => '京都銀閣寺前にある哲学の道です。春には桜が綺麗です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '銀閣寺',
            'profile' => '京都にある銀閣寺です',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '出雲大社１',
            'profile' => 'TVなどでよく見るあの場所です。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '出雲大社２',
            'profile' => '本殿の方です。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '入道雲',
            'profile' => '９月に撮影した入道雲です。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '嵐山１',
            'profile' => '京都にある嵐山です。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '嵐山２',
            'profile' => '晴れてくれたらよかった……',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '渡月橋',
            'profile' => '橋の方の渡月橋です。倉木さんの渡月橋ではありません。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '着物フォレスト１',
            'profile' => '嵐電・嵐山駅の横にあります。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '着物フォレスト２',
            'profile' => '夜になるとライトアップするそうです。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => 'エビ',
            'profile' => 'nifureru水族館にて撮影',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '魚１',
            'profile' => 'nifureru水族館にて撮影しました。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '魚２',
            'profile' => 'nihureru水族館にて撮影',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => 'イソギンチャク',
            'profile' => 'nifureru水族館にて撮影しました。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '水槽',
            'profile' => '水槽を横からとってみるといい感じになりました。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => 'チンアナゴ',
            'profile' => 'nihureru水族館にて撮影しました。',
            'createrid'=>'1'
        ]);
        Item::create([
            'name' => '紫陽花',
            'profile' => '８月に撮影した紫陽花です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '明治神宮',
            'profile' => '明治神宮にて撮影しました。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '日本橋',
            'profile' => '東京の方の日本橋です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => 'お地蔵さん',
            'profile' => '島根県にある松江城周辺にあるお地蔵さんの一つです。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '手水屋',
            'profile' => '出雲大社の手水屋です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '緑のポスト',
            'profile' => '緑色のポストです。珍しいので撮影。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '空',
            'profile' => '夕空です。',
            'createrid'=>'1'
        ]);

        Item::create([
            'name' => '夕陽',
            'profile' => '日本一夕陽が美しい場所にて撮影しました',
            'createrid'=>'1'
        ]);
    }
}
