<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'name'          => "The Unhappy Lobster",
            'phone'         => rand(100000000, 999999999),
            'address1'      => "123 This address was seeded",
            'address2'      => "so was this line",
            'suburb'        => str_random(5),
            'state'         => str_random(3),
            'numberofseats' => rand(1, 100),
            'country_id'    => rand(1, 5),
            'category_id'   => rand(1, 6),
        ]);

        DB::table('restaurants')->insert([
            'name'          => "Beerz n burgz",
            'phone'         => rand(100000000, 999999999),
            'address1'      => "123 This address was seeded",
            'address2'      => "so was this line",
            'suburb'        => str_random(5),
            'state'         => str_random(3),
            'numberofseats' => rand(1, 100),
            'country_id'    => rand(1, 5),
            'category_id'   => rand(1, 6),
        ]);

        DB::table('restaurants')->insert([
            'name'          => "La Chateux De Villa",
            'phone'         => rand(100000000, 999999999),
            'address1'      => "123 This address was seeded",
            'address2'      => "so was this line",
            'suburb'        => str_random(5),
            'state'         => str_random(3),
            'numberofseats' => rand(1, 100),
            'country_id'    => rand(1, 5),
            'category_id'   => rand(1, 6),
        ]);

        DB::table('restaurants')->insert([
            'name'          => "Curly Wurly",
            'phone'         => rand(100000000, 999999999),
            'address1'      => "123 This address was seeded",
            'address2'      => "so was this line",
            'suburb'        => str_random(5),
            'state'         => str_random(3),
            'numberofseats' => rand(1, 100),
            'country_id'    => rand(1, 5),
            'category_id'   => rand(1, 6),
        ]);
    }
}
