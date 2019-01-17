<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //管理者
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'rank' => '1'
        ]);


        //一般ユーザ
        for($i = 1; $i < 480; $i++) {
            User::create([
                'name' => 'user'.$i,
                'email' => 'mail'.$i.'@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'rank' => '0'
            ]);
        }
    }
}
