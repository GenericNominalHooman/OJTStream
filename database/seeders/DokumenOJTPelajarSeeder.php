<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenOJTPelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenOJTPelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PELAJAR AKV0222KA009
        DokumenOJTPelajar::factory()->create();
        DokumenOJTPelajar::factory()->create([
            "dokumen_ojt_id" => 2,
        ]);
        
        // PELAJAR AKV0222KA010
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 106,
        ]);
        DokumenOJTPelajar::factory()->create([
            "dokumen_ojt_id" => 2,
            "pelajar_id" => 106,
        ]);
    }
}
