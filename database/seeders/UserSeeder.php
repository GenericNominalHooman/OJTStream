<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KUPLI
        User::factory()->create([
            "id" => 101,
            "name" => "KUPLI 1",
            "email" => "kupli_1@email.com",
            "password" => ("password"),
        ]);

        // Penyelaras Program
        User::factory()->create([
            "id" => 102,
            "name" => "Penyelaras Program 1",
            "email" => "penyelaras_program_1@email.com",
            "password" => ("password")
        ]);
        
        // PPO
        User::factory()->create([
            "id" => 103,
            "name" => "Pensyarah Penilai OJT 1",
            "email" => "pensyarah_penilai_ojt_1@email.com",
            "password" => ("password")
        ]);

        // PP
        User::factory()->create([
            "id" => 104,
            "name" => "Pensyarah Penilai 1",
            "email" => "pensyarah_penilai_1@email.com",
            "password" => ("password")
        ]);

        // Pelajar
        User::factory()->create([
            "id" => 105,
            "name" => "Pelajar 1",
            "email" => "pelajar_1@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "01127135691",
            "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);
    }
}
