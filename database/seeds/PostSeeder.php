<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i = 1; $i <= 10; $i++ )
        {
            DB::table('posts')->insert([
                'id'            => $i,
                'content'       => "seeded post #" . rand(1, 9000),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
                'restaurant_id' => rand(1, 5),
                'user_id'       => rand(1, 10),
            ]);
        }
    }
}
