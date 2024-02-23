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
        DokumenOJTPelajar::factory()->create();
        DokumenOJTPelajar::factory()->create([
            "dokumen_ojt_id" => 2,
        ]);
    }
}
