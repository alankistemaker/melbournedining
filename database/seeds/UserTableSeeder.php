<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        DB::table('users')->insert([
            'name'          => $faker->name,
            'email'         => $faker->email,
            'password'      => str_random(8),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'country_id'    => rand(1,5),
        ]);
    }
}
