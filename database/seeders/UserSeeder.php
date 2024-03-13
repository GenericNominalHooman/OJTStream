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
            "name" => "MUHD SYAHIR BIN MANSOR",
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
        
        User::factory()->create([
            "id" => 107,
            "name" => "Kamarul Abrar",
            "email" => "pensyarah_penilai_ojt_2@email.com",
            "password" => ("password")
        ]);

        User::factory()->create([
            "id" => 108,
            "name" => "Adzli",
            "email" => "pensyarah_penilai_ojt_3@email.com",
            "password" => ("password")
        ]);

        // PP
        User::factory()->create([
            "id" => 104,
            "name" => "Pensyarah Penilai 1",
            "email" => "pensyarah_penilai_1@email.com",
            "password" => ("password")
        ]);

        // Pelajar AKV0222KA009
        User::factory()->create([
            "id" => 105,
            "name" => "Iskandar Luqman",
            "email" => "iskandar_luqman@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "1127135691",
            "gender" => "male",
            // "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);

        // Pelajar AKV0222KA010
        User::factory()->create([
            "id" => 106,
            "name" => "Kamarul Abrar",
            "email" => "kamarul_abrar@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "1127135691",
            "gender" => "male",
            // "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);

        // Pelajar AKV0222KA011
        User::factory()->create([
            "id" => 109,
            "name" => "Silmi Absyar",
            "email" => "silmi_absyar@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "1127135691",
            "gender" => "male",
            // "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);

        // Pelajar AKV0222KA011
        User::factory()->create([
            "id" => 110,
            "name" => "Syed Adam",
            "email" => "syed_adam@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "1127135691",
            "gender" => "male",
            // "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);

        // Pelajar AKV0222KA011
        User::factory()->create([
            "id" => 111,
            "name" => "Akid Rahman",
            "email" => "akid_rahman@email.com",
            "password" => ("password"),
            "location" => "Taman Chepor Impian, Laluan 15",
            "phone" => "1127135691",
            "gender" => "male",
            // "about" => "A 2DVMKPD student developing OJTStream as an FYP",
        ]);
    }
}
