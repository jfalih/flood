<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'trombosit' => 0,
            'hemogoblin' => 0,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Jan Falih Fadhillah',
            'email' => 'janfalih@example.com',
            'password' => Hash::make('password'),
            'trombosit' => 0,
            'hemogoblin' => 0,
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
