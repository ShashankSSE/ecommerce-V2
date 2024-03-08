<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'header_logo' => 'default_logo.png',
            'favicon' => 'default_favicon.png',
            'footer_logo' => 'default_footer_logo.png',
            'short_description' => 'Your default short description here.',
            'meta_title' => 'Default Meta Title',
            'meta_keyword' => 'Default, Keywords, Here',
            'meta_description' => 'Your default meta description here.',
            'mobile' => '1234567890',
            'email' => 'info@example.com',
            'address' => '123 Street, City, Country',
            'social_media' => json_encode([
                'Facebook' => 'https://facebook.com/example',
                'Instagram' => 'https://instagram.com/example', 
                'Snapchat' => 'https://snapchat.com/example', 
                'Twitter' => 'https://twitter.com/example', 
            ]),
            'credits' => 'Your default credits here.',
        ]);
    }
}
