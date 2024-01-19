<?php

namespace Database\Seeders;

use App\Models\Pensyarah_Penilai_OJT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PensyarahPenilaiOJTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Pensyarah_Penilai_OJT::factory()->create([
            "user_id" => 103,
       ]);
    }
}
