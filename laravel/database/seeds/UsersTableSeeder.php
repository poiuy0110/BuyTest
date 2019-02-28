<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 'admin',
                'password' => '$2y$10$t9HvduSujBtu33h9Q6M/Zelm2Shqj9eMt7LpovXBjgcIIl5BzfnkK',
                'title' => NULL,
                'level' => NULL,
                'email' => NULL,
                'active' => 1,
                'last_login' => NULL,
                'last_login_ip' => NULL,
                'created_at' => '2019-02-17 05:19:49',
                'updated_at' => '2019-02-17 05:19:49',
            ),
        ));
        
        
    }
}