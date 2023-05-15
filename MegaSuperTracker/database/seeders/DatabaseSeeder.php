<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@localhost',
            'password' => Hash::make('0000'),
        ]);

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('000000'),
        ]);
    }
}
