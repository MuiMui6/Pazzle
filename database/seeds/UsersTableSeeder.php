<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'user1',
            'email' => 'mail1@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'anser' => '1234567890',
            'rank' => '1'
        ]);

        //一般ユーザ
        for ($i = 2; $i < 480; $i++) {
            User::create([
                'name' => 'user' . $i,
                'email' => 'mail' . $i . '@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'anser' => '1234567890',
                'rank' => '0'
            ]);
        }


        //管理者
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'anser' => '1234567890',
            'rank' => '1'
        ]);
    }
}
