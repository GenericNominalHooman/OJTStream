<?php

namespace Database\Seeders;

use App\Models\JanjiTemusPelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JanjiTemuPelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 105,
            "janji_temu_id" => 1,
            "visit_type" => "Lawatan PPO 1",
        ]);

        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 106,
            "janji_temu_id" => 2,
            "visit_type" => "Lawatan PPO 2",
        ]);
    }
}
