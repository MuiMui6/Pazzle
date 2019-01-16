<?php

use Illuminate\Database\Seeder;
use App\Warehouse;

class WarehousesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 300; $i++) {
            Warehouse::create([
                'itemid' => random_int('1', '28'),
                'cnt' => random_int('1', '20'),
                'createrid' => '1'
            ]);
        }
    }
}
