<?php

namespace Database\Seeders;

use App\Models\KetuaJabatanDanKetuaProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetuaJabatanDanKetuaProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KetuaJabatanDanKetuaProgram::factory()->times(5)->create();
    }
}
