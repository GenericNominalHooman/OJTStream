<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Penyelaras_Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenyelarasProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyelaras_Program::factory()->create([
            "id" => 1,
            "user_id" => User::factory()->create([
                "id" => 200,
                "name" => "SYAHIR BIN MANSOR",
                "username" => "CG SYAHIR",
            ])
        ]);

        Penyelaras_Program::factory()->times(10)->create();
    }
}
