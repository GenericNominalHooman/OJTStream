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
        KetuaJabatanDanKetuaProgram::factory()->times(10)->create();
    }
}
