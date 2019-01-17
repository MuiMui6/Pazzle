<?php

use Illuminate\Database\Seeder;
use App\SpotComment;

class SpotCommentsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 200; $i++) {
            SpotComment::create([
                'spotid' => random_int('1', '106'),
                'userid' => random_int('1', '100'),
                'evaluation' => random_int('0', '5'),
                'comment' => 'とてもいいところです！'
            ]);
        }
    }
}
