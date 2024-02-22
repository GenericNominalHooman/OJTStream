<?php

namespace Database\Seeders;

use App\Models\Penyelaras_Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyelarasProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penyelaras_Program::factory()->create([
            "user_id" => 102,
        ]);
    }
}
