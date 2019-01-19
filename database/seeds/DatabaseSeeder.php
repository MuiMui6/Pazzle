<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AddressesTableSeeder::class,
            ItemsTableSeeder::class,
            ItemCommentsTableSeeder::class,
            OrdersTableSeeder::class,
            PeasesTableSeeder::class,
            SizesTableSeeder::class,
            SpotsTableSeeder::class,
            SpotCommentsTableSeeder::class,
            TagsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
