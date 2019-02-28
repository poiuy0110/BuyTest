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
        /*DB::table('users')->insert([
            'username'=>'admin',          // 帳號
            'password'=>bcrypt('123456789'),
            'avtive'=>1, 
            'email'=>'poiuy0110@hotmail.com.tw', // 密碼
        ]);*/
        $this->call(UsersTableSeeder::class);
    }
}
