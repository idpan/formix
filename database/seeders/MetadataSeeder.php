<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Metadata;

class MetadataSeeder extends Seeder
{
    public function run()
    {
        // Untuk halaman Home
        $homePage = Page::firstWhere('name', 'Home');

        Metadata::create([
            'page_id' => $homePage->id,
            'meta_title' => 'CV Wiljantoro Mukti | Kontraktor Terpercaya di Indonesia',
            'meta_description' => 'CV Wiljantoro Mukti adalah kontraktor terpercaya yang melayani pembangunan rumah dan proyek konstruksi di seluruh Indonesia.',
            'meta_keywords' => 'kontraktor, pembangunan rumah, konstruksi, pembangunan rumah di Indonesia, kontraktor terpercaya',
            'meta_og_image' => 'default-og-home.jpg',
            'json_ld' => json_encode([
                "@context" => "https://schema.org",
                "@type" => "LocalBusiness",
                "name" => "CV Wiljantoro Mukti",
                "url" => "https://cvwiljantoro.com",
                "logo" => "https://cvwiljantoro.com/images/logo.png",
                "address" => [
                    "@type" => "PostalAddress",
                    "streetAddress" => "Jl. Contoh No.123",
                    "addressLocality" => "Serpong",
                    "addressRegion" => "Banten",
                    "postalCode" => "15310",
                    "addressCountry" => "ID"
                ],
                "areaServed" => [
                    "@type" => "Country",
                    "name" => "Indonesia"
                ],
                "contactPoint" => [
                    "@type" => "ContactPoint",
                    "telephone" => "+62-812-3456-7890",
                    "contactType" => "Customer Service"
                ]
            ])
        ]);

        // Untuk halaman About
        $aboutPage = Page::firstWhere('name', 'About');

        Metadata::create([
            'page_id' => $aboutPage->id,
            'meta_title' => 'Tentang Kami - CV Wiljantoro Mukti',
            'meta_description' => 'Pelajari lebih lanjut tentang CV Wiljantoro Mukti, perusahaan kontraktor dengan pengalaman lebih dari 10 tahun di Indonesia.',
            'meta_keywords' => 'tentang kami, perusahaan kontraktor, pengalaman konstruksi, kontraktor berpengalaman',
            'meta_og_image' => 'default-og-about.jpg', // Ganti dengan gambar sesuai
            'json_ld' => json_encode([
                "@context" => "https://schema.org",
                "@type" => "Organization",
                "name" => "CV Wiljantoro Mukti",
                "url" => "https://cvwiljantoro.com/about",
                "logo" => "https://cvwiljantoro.com/images/logo.png",
                "description" => "CV Wiljantoro Mukti adalah perusahaan kontraktor terpercaya yang telah melayani berbagai proyek konstruksi di Indonesia.",
                "contactPoint" => [
                    "@type" => "ContactPoint",
                    "telephone" => "+62-812-3456-7890",
                    "contactType" => "Customer Service"
                ]
            ])
        ]);

        // Untuk halaman Project
        $projectPage = Page::firstWhere('name', 'Projects');

        Metadata::create([
            'page_id' => $projectPage->id,
            'meta_title' => 'Proyek Kami - CV Wiljantoro Mukti',
            'meta_description' => 'Lihat berbagai proyek yang telah diselesaikan oleh CV Wiljantoro Mukti, kontraktor terpercaya di Indonesia.',
            'meta_keywords' => 'proyek konstruksi, proyek rumah, proyek pembangunan, proyek selesai',
            'meta_og_image' => 'default-og-project.jpg', // Ganti dengan gambar sesuai
            'json_ld' => json_encode([
                "@context" => "https://schema.org",
                "@type" => "Project",
                "name" => "Proyek Pembangunan Rumah",
                "url" => "https://cvwiljantoro.com/projects",
                "image" => "https://cvwiljantoro.com/images/projects/project-1.jpg",
                "description" => "CV Wiljantoro Mukti telah berhasil menyelesaikan berbagai proyek pembangunan rumah dan bangunan komersial di seluruh Indonesia.",
                "workPerformed" => "Pembangunan Rumah, Renovasi Bangunan"
            ])
        ]);
    }
}
