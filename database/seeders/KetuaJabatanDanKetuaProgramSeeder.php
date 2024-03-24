<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\KetuaJabatanDanKetuaProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KetuaJabatanDanKetuaProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KetuaJabatanDanKetuaProgram::factory()->create([
            "user_id" => User::factory()->create([
                "id" => 100,
                "name" => "MUHAMMAD BIN ISMAIL",
                "username" => "CG MUHAMMAD",
            ])
        ]);
        // KetuaJabatanDanKetuaProgram::factory()->create([
        //     "user_id" => User::factory()->create([
        //         "id" => 101,
        //         "name" => "SHAFINA BINTI MUHD SALEH",
        //         "username" => "CG SHAFINA",
        //     ])
        // ]);

        KetuaJabatanDanKetuaProgram::factory()->times(10)->create();
    }
}
