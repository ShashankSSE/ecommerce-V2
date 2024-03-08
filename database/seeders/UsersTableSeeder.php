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
            'name' => 'Admin',
            'email' => 'admin@ecom.com',
            'is_admin'=> true,
            'email_verified_at' => now(),
            'password' => Hash::make('admin@ecom.com'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
