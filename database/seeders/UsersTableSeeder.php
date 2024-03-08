<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@ecom.com',
            'is_admin'=> false,
            'email_verified_at' => now(),
            'password' => Hash::make('user@ecom.com'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
