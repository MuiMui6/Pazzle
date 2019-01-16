<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Order;

class OrdersTableSeeder extends Seeder
{

    public function run()
    {
        for($i = 1; $i <=1000;$i++){

            Order::create([
            'userid' => random_int('1','100'),
            'itemid' => random_int('1','28'),
            'cnt' => random_int('1','5'),
            'addressid' => random_int('1','424'),
            ]);
        }
        //Order::create([
        //'userid' => '',
        //'itemid' => '',
        //'cnt' => '',
        //'address' => '',
        //]);
    }
}
