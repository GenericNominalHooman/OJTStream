<?php

namespace Database\Seeders;

use App\Models\Pelajar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelajar::factory()->create([
            "user_id" => 105,
            "matrix_number" => "AKV0222KA009",
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"DVM",
            "semester" =>	4,
            "status" =>	"Belum_OJT",
            "nric_number" => "040916080159",
            "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
            "guardian_telephone_number" => "0165190476",
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "program" => "KPD",
            "heart_disease" => false,
            "asthma" => false,
            "diabetes" => false,
            "osteoporosis" => false,

            // Foreign keys
            "pensyarah_penilai_id" => 1,
            "pensyarah_penilai_ojt_id" => 1,
            "penyelaras_program_id" => 1,
            "skop_kerja_id" => 1,
        ]);

        Pelajar::factory()->create([
            "user_id" => 106,
            "matrix_number" => "AKV0222KA010",
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"DVM",
            "semester" =>	4,
            "status" =>	"Belum_OJT",
            "nric_number" => "040916080159",
            "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
            "guardian_telephone_number" => "0165190476",
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "program" => "KPD",
            "heart_disease" => false,
            "asthma" => false,
            "diabetes" => false,
            "osteoporosis" => false,

            // Foreign keys
            "pensyarah_penilai_id" => 1,
            "pensyarah_penilai_ojt_id" => 1,
            "penyelaras_program_id" => 1,
            "skop_kerja_id" => 2,
        ]);
    }
}
