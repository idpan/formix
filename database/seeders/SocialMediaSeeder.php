<?php
// database/seeders/SocialMediaSeeder.php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        $socials = [
            ['username' => 'myusername', 'platform' => 'Facebook', 'url' => 'https://facebook.com/mycompany'],
            ['username' => '@myusername', 'platform' => 'Instagram', 'url' => 'https://instagram.com/mycompany'],
            ['username' => 'my_username', 'platform' => 'LinkedIn', 'url' => 'https://linkedin.com/company/mycompany'],
        ];

        foreach ($socials as $social) {
            SocialMedia::create($social);
        }
    }
}
