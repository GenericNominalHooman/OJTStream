<?php

namespace Database\Seeders;

use App\Models\Penguguman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengugumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penguguman::factory()->times(5)->create();
    }
}
