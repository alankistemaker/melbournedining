<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'          => 'Manager',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'          => 'Staff',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'          => 'Customer',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name'          => 'Admin',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    }
}
