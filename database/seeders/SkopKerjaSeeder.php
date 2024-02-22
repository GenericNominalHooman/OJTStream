<?php

namespace Database\Seeders;

use App\Models\SkopKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkopKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SkopKerja::factory()->times(2)->create();
    }
}
