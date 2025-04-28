<?php
// database/seeders/ProjectSeeder.php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $project = Project::create([
                'title' => "Project $i",
                'client' => "Client $i",
                'description' => "Description for project $i."
            ]);

            // Tambahkan beberapa gambar untuk tiap project
            for ($j = 1; $j <= 3; $j++) {
                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "https://via.placeholder.com/600x400?text=Project+$i+Image+$j",

                ]);
            }
        }
    }
}
