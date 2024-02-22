<?php

namespace Database\Seeders;

use App\Models\Pensyarah_Penilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PensyarahPenilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pensyarah_Penilai::factory()->create([
            "id" => 1,
            "user_id" => 104,
        ]);
    }
}
