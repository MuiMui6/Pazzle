<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {

        //北海道
        for ($i = 0; $i < 10; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '000000' . $i,
                'add1' => '北海道',
                'add2' => '札幌市0-0-0'
            ]);
        }

        //青森県
        for ($i = 11; $i < 20; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '青森県',
                'add2' => '青森市0-0-0'
            ]);
        }

        //秋田県
        for ($i = 21; $i < 30; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '秋田県',
                'add2' => '秋田市0-0-0'
            ]);
        }

        //岩手県
        for ($i = 31; $i < 40; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '岩手県',
                'add2' => '盛岡市0-0-0'
            ]);
        }

        //宮城県
        for ($i = 41; $i < 50; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '宮城県',
                'add2' => '仙台市0-0-0'
            ]);
        }

        //福島県
        for ($i = 51; $i < 60; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '福島県',
                'add2' => '福嶋氏0-0-0'
            ]);
        }

        //山形県
        for ($i = 61; $i < 70; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '山形県',
                'add2' => '山形市0-0-0'
            ]);
        }

        //=============================================================================================
        //茨城県
        for ($i = 71; $i < 80; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '茨城県',
                'add2' => '水戸市0-0-0'
            ]);
        }

        //神奈川県
        for ($i = 81; $i < 90; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '神奈川県',
                'add2' => '横浜市0-0-0'
            ]);
        }

        //群馬県
        for ($i = 91; $i < 100; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '群馬県',
                'add2' => '前橋市0-0-0'
            ]);
        }

        //埼玉県
        for ($i = 101; $i < 110; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '埼玉県',
                'add2' => 'さいたま市0-0-0'
            ]);
        }

        //千葉県
        for ($i = 111; $i < 120; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '千葉県',
                'add2' => '千葉市0-0-0'
            ]);
        }

        //東京都
        for ($i = 121; $i < 130; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '東京都',
                'add2' => '新宿区0-0-0'
            ]);
        }

        //栃木県
        for ($i = 131; $i < 140; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '栃木県',
                'add2' => '宇都宮市0-0-0'
            ]);
        }


        //=============================================================================================
        //愛知県
        for ($i = 141; $i < 150; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '愛知県',
                'add2' => '名古屋市0-0-0'
            ]);
        }

        //石川県
        for ($i = 151; $i < 160; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '石川県',
                'add2' => '金沢市0-0-0'
            ]);
        }

        //岐阜県
        for ($i = 161; $i < 170; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '岐阜県',
                'add2' => '岐阜市0-0-0'
            ]);
        }

        //静岡県
        for ($i = 171; $i < 180; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '静岡県',
                'add2' => '静岡市0-0-0'
            ]);
        }

        //富山県
        for ($i = 181; $i < 190; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '富山県',
                'add2' => '富山市0-0-0'
            ]);
        }

        //長野県
        for ($i = 191; $i < 200; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '長野県',
                'add2' => '長野市0-0-0'
            ]);
        }

        //新潟県
        for ($i = 201; $i < 210; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '新潟県',
                'add2' => '新潟市0-0-0'
            ]);
        }

        //福井県
        for ($i = 211; $i < 220; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '福井県',
                'add2' => '福井市0-0-0'
            ]);
        }

        //山梨県
        for ($i = 221; $i < 230; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '山梨県',
                'add2' => '甲府市0-0-0'
            ]);
        }


        //=============================================================================================
        //大阪府
        for ($i = 231; $i < 240; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '大阪府',
                'add2' => '大阪市0-0-0'
            ]);
        }

        //京都府
        for ($i = 241; $i < 250; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '京都府',
                'add2' => '京都市0-0-0'
            ]);
        }

        //滋賀県
        for ($i = 251; $i < 260; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '滋賀県',
                'add2' => '大津市0-0-0'
            ]);
        }

        //奈良県
        for ($i = 261; $i < 270; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '奈良県',
                'add2' => '奈良市0-0-0'
            ]);
        }

        //兵庫県
        for ($i = 271; $i < 280; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '兵庫県',
                'add2' => '神戸市0-0-0'
            ]);
        }

        //三重県
        for ($i = 281; $i < 290; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '三重県',
                'add2' => '津市0-0-0'
            ]);
        }

        //和歌山県
        for ($i = 291; $i < 300; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '和歌山県',
                'add2' => '和歌山市0-0-0'
            ]);
        }

        //=============================================================================================
        //岡山県
        for ($i = 301; $i < 310; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '岡山県',
                'add2' => '岡山市0-0-0'
            ]);
        }

        //島根県
        for ($i = 311; $i < 320; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '島根県',
                'add2' => '松江市0-0-0'
            ]);
        }

        //鳥取県
        for ($i = 321; $i < 330; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '鳥取県',
                'add2' => '鳥取市0-0-0'
            ]);
        }

        //広島県
        for ($i = 331; $i < 340; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '広島県',
                'add2' => '広島市0-0-0'
            ]);
        }

        //山口県
        for ($i = 341; $i < 350; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '山口県',
                'add2' => '山口市0-0-0'
            ]);
        }


        //=============================================================================================
        //愛媛県
        for ($i = 351; $i < 360; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '愛媛県',
                'add2' => '松山市0-0-0'
            ]);
        }

        //香川県
        for ($i = 361; $i < 370; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '香川県',
                'add2' => '高松市0-0-0'
            ]);
        }

        //高知県
        for ($i = 371; $i < 380; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '高知県',
                'add2' => '高知市0-0-0'
            ]);
        }

        //徳島県
        for ($i = 381; $i < 390; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '徳島県',
                'add2' => '徳島市0-0-0'
            ]);
        }


        //=============================================================================================
        //大分県
        for ($i = 391; $i < 400; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '大分県',
                'add2' => '大分市0-0-0'
            ]);
        }

        //熊本県
        for ($i = 401; $i < 410; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '熊本県',
                'add2' => '熊本市0-0-0'
            ]);
        }

        //鹿児島県
        for ($i = 411; $i < 420; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '鹿児島県',
                'add2' => '鹿児島市0-0-0'
            ]);
        }

        //佐賀県
        for ($i = 421; $i < 430; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '佐賀県',
                'add2' => '佐賀市0-0-0'
            ]);
        }

        //長崎県
        for ($i = 431; $i < 440; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '長崎県',
                'add2' => '長崎市0-0-0'
            ]);
        }

        //福岡県
        for ($i = 441; $i < 450; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '福岡県',
                'add2' => '福岡市0-0-0'
            ]);
        }

        //宮崎県
        for ($i = 451; $i < 460; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '宮崎県',
                'add2' => '宮崎市0-0-0'
            ]);
        }

        //沖縄
        for ($i = 461; $i < 470; $i++) {
            Address::create([
                'userid' => $i,
                'toname' => 'Test'.$i,
                'post' => '00000' . $i,
                'add1' => '沖縄県',
                'add2' => '那覇市0-0-0'
            ]);
        }

    }
}
