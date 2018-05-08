<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id'            => rand(1, 999999),
            'content'       => "Seeded Comment #" . rand(1, 99999),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'post_id'       => rand(1, 10),
            'user_id'       => rand(1, 10),
        ]);
    }
}
