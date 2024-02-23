<?php

namespace Database\Seeders;

use App\Models\DokumenOJT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumenOJTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DokumenOJT::factory()->create([
            "document_name" => "KVOJT01.pdf",
            "document_description" => "Dokumen biodata pelajar OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT02.pdf",
            "document_description" => "Dokumen aku janji",
        ]);

        // DokumenOJT::factory()->times(5)->create();
    }
}
