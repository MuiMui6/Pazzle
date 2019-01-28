<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ItemComment;

class ItemCommentsTableSeeder extends Seeder
{
    public function run()
    {
        //
        for ($j = 1; $j <= 100; $j++) {
            ItemComment::create([
                'itemid' => random_int('1', '28'),
                'userid' => random_int('1', '100'),
                'evaluation' => random_int('0', '5'),
                'comment' => 'Item Comment!'
            ]);
        }
    }
}
