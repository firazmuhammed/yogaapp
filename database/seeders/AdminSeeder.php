<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@aptus.com',
            'password' => bcrypt('12345678'),
            'role' => 'Admin',
            'mobile' => '9897654234',
        ]);
    }
}
