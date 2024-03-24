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
        // KAMARUL ABRAR BIN NORDIN | SEDANG
        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 501,
            "janji_temu_id" => 1,
            "visit_type" => "Lawatan PPO 1",
        ]);

        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 501,
            "janji_temu_id" => 2,
            "visit_type" => "Lawatan PPO 2",
        ]);

        // AHMAD AKID BIN ABD RAHMAN | SELESAI
        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 502,
            "janji_temu_id" => 1,
            "visit_type" => "Lawatan PPO 1",
        ]);

        JanjiTemusPelajar::factory()->create([
            "pelajar_id" => 502,
            "janji_temu_id" => 2,
            "visit_type" => "Lawatan PPO 2",
        ]);
    }
}
