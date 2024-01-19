<?php

namespace Database\Seeders;

use App\Models\Kupli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KupliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kupli::factory()->create([
            "user_id" => 101,
        ]);
    }
}
