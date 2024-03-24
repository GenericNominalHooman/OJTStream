<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Pensyarah_Penilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PensyarahPenilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pensyarah_Penilai::factory()->create([
            "id" => 1,
            "user_id" => User::factory()->create([
                "id" => 400,
                "username" => "CG FAIZAH",
                "name" => "FAIZAH",
            ]),
       ]);

       Pensyarah_Penilai::factory()->times(10)->create();
    }
}
