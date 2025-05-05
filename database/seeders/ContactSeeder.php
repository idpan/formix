<?php
// database/seeders/ContactSeeder.php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'phone' => '+6281234567890',
            'email' => 'info@company.com',
        ]);
    }
}
