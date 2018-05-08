<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'          => "Italian",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);
        
        DB::table('categories')->insert([
            'name'          => "Mexican",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);
        
        DB::table('categories')->insert([
            'name'          => "French",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);
        
        DB::table('categories')->insert([
            'name'          => "Greek",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);

        DB::table('categories')->insert([
            'name'          => "Chinese",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);

        DB::table('categories')->insert([
            'name'          => "Japanese",
            'created_at'    => Carbon::Now(),
            'updated_at'    => Carbon::Now(),
        ]);
    }
}
