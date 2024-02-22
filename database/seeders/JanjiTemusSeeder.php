<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JanjiTemusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 1,
            "visit_type" => "Lawatan PPO 1",
        ]);

        JanjiTemu::factory()->create([
            "pensyarah_penilai_ojt_id" => 1,
            "visit_type" => "Lawatan PPO 2",
            "visit_at" => now()->addMonths(5),
        ]);
    }
}
