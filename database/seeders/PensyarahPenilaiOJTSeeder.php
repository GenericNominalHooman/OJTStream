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
            "id" => 1,
            "user_id" => 103,
       ]);


       Pensyarah_Penilai_OJT::factory()->create([
            "id" => 2,
            "user_id" => 107,
        ]);

       Pensyarah_Penilai_OJT::factory()->create([
            "id" => 3,
            "user_id" => 108,
        ]);
    }
}
