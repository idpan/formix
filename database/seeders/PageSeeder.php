<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Section;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // Home Page
        $home = Page::create([
            'name' => 'home',
            'slug' => 'home',

        ]);

        Section::insert([
            [
                'page_id' => $home->id,
                'name' => 'hero',
                'header' => 'Build Your Dream Home',
                'paragraph' => 'We provide the best construction services for your future.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_id' => $home->id,
                'name' => 'about',
                'header' => 'Who We Are',
                'paragraph' => 'CV Wiljantoro Mukti is a trusted contractor company with over 10 years of experience.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_id' => $home->id,
                'name' => 'featured_project',
                'header' => 'Our Best Works',
                'paragraph' => 'Check out our featured projects across Java Island.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // About Page
        $about = Page::create([
            'name' => 'About',
            'slug' => 'about',
        ]);

        Section::insert([
            [
                'page_id' => $about->id,
                'name' => 'story',
                'header' => 'Our Story',
                'paragraph' => 'Founded in 2010, our mission is to build with integrity.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_id' => $about->id,
                'name' => 'vision',
                'header' => 'Our Vision',
                'paragraph' => 'To be the leading construction company in Indonesia.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_id' => $about->id,
                'name' => 'mission',
                'header' => 'Our Mission',
                'paragraph' => 'Deliver quality, safe, and sustainable buildings.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Project Page
        $project = Page::create([
            'name' => 'Projects',
            'slug' => 'projects',
        ]);

        Section::create([
            'page_id' => $project->id,
            'name' => 'hero',
            'header' => 'Projects That Speak Quality',
            'paragraph' => 'See how we turn blueprints into reality.',
        ]);
    }
}
