<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CountrySeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(RestaurantSeeder::class);
         
         for ( $i = 1; $i < 11; $i++ )
         {
            $this->call(UserTableSeeder::class);
         }

         $this->call(PostSeeder::class);

         for ( $i = 1; $i < 110; $i++ )
         {
             $this->call(CommentSeeder::class);
         }

         $this->call(RoleSeeder::class);

        DB::table('users')->insert([
            'name'          => 'admin',
            'email'         => 'admin@melbournedining.com.au',
            'password'      => 'password',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
            'country_id'    => rand(1,5),
        ]);
    }
}
