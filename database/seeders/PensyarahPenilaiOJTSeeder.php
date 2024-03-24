<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Pensyarah_Penilai_OJT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PensyarahPenilaiOJTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Pensyarah_Penilai_OJT::factory()->create([
           "id" => 1,
            "user_id" => User::factory()->create([
                "id" => 300,
                "username" => "CG RIDZUAN",
                "name" => "RIDZUAN BIN ABDUL RAHMAN",
            ]),
       ]);
       Pensyarah_Penilai_OJT::factory()->create([
           "id" => 2,
            "user_id" => User::factory()->create([
                "id" => 301,
                "username" => "CG FARAHANA",
                "name" => "FARAHANA",
            ]),
       ]);

       Pensyarah_Penilai_OJT::factory()->times(10)->create();
    }
}
