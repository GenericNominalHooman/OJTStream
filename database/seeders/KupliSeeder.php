<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kupli;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KupliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kupli::factory()->create([
            "user_id" => User::factory()->create([
                "id" => 2,
                "username" => "KAMASURIATI",
                "name" => "KAMASURIATI",
            ]),
        ]);

        // Kupli::factory()->times(10)->create();
    }
}
