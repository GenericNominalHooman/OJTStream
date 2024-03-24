<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use App\Models\JanjiTemusPelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JanjiTemusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KAMARUL ABRAR s JANJITEMU | SEDANG OJT
        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 1,
            "visit_at" => now()->addMonths(2),
        ]);

        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 1,
            "visit_at" => now()->addMonths(5),
        ]);
        
        // AHMAD AKID'S JANJITEMU | SELESAI OJT
        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 2,
            "visit_at" => now()->subMonths(5),
        ]);

        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 2,
            "visit_at" => now()->subMonths(2),
        ]);
    }
}
