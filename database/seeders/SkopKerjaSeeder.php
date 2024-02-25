<?php

namespace Database\Seeders;

use App\Models\SkopKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkopKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkopKerja::factory()->create([
            "document_name" => "JOB_DESCRIPTION.pdf",
            "document_path" => "Pelajar_AKV0222KA009/ORGANISASI_LATIHAN/JOB_DESCRIPTION.pdf",
        ]);

        SkopKerja::factory()->create([
            "document_name" => "JOB_DESCRIPTION.pdf",
            "document_path" => "Pelajar_AKV0222KA010/ORGANISASI_LATIHAN/JOB_DESCRIPTION.pdf",
        ]);
    }
}
