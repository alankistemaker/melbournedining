<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Alan',
            'email' => 'alankistemaker@gmail.com',
            'password' => 'pass',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'country_id' => '1'
        ]);
    }
}
