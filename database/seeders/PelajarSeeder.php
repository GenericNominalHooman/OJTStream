<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pelajar;
use App\Models\PelajarsCompany;
use App\Models\Penyelaras_Program;
use App\Models\SkopKerja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // BELUM OJT
        Pelajar::factory()->create([
            "user_id" => User::factory()->create([
                "id" => 500,
                "name" => "MUHAMMAD ISKANDAR LUQMAN BIN ZAHARI",
                "username" => "MUHAMMAD ISKANDAR LUQMAN BIN ZAHARI",
            ]),
            "matrix_number" => "AKV0222KA001",
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"SVM",
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
            "pensyarah_penilai_id" => null,
            "pensyarah_penilai_ojt_id" => null,
            "penyelaras_program_id" => 1, // SYAHIR MANSOR
            "skop_kerja_id" => null,
        ]);

        // SEDANG OJT
        Pelajar::factory()->create([
            "user_id" => User::factory()->create([
                "id" => 501,
                "name" => "KAMARUL ABRAR BIN NORDIN",
                "username" => "KAMARUL ABRAR BIN NORDIN",
            ]),
            "matrix_number" => "AKV0222KA002",
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"DVM",
            "semester" =>	8,
            "status" =>	"Sedang_OJT",
            "nric_number" => "462697466267",
            "guardian" => "Miss Lolita Schroeder",
            "guardian_telephone_number" => "+1-360-540-6881",
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "program" => "HBP",
            "heart_disease" => false,
            "asthma" => false,
            "diabetes" => false,
            "osteoporosis" => false,
            "date_started" => now()->subMonths(),
            "date_completed" => now()->addMonths(5),

            // Foreign keys
            "pensyarah_penilai_id" => 1,// CG FAIZAH
            "pensyarah_penilai_ojt_id" => 1, // CG RIDZUAN
            "penyelaras_program_id" => 1, // SYAHIR MANSOR
            "skop_kerja_id" => SkopKerja::factory()->create([
                "document_name" => "JOB_DESCRIPTION.pdf",
                "document_path" => "Pelajar_AKV0222KA002/ORGANISASI_LATIHAN/JOB_DESCRIPTION.pdf",
            ]),
        ]);

        // TAMAT OJT
        Pelajar::factory()->create([
            "user_id" => User::factory()->create([
                "id" => 502,
                "name" => "AHMAD AKID BIN ABD RAHMAN",
                "username" => "AHMAD AKID BIN ABD RAHMAN",
            ]),
            "matrix_number" => "AKV0222KA003",
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"DVM",
            "semester" =>	8,
            "status" =>	"Selesai_OJT",
            "nric_number" => "462697466267",
            "guardian" => "Skylar Lebsack",
            "guardian_telephone_number" => "+1-806-878-2706",
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "program" => "MTK",
            "heart_disease" => false,
            "asthma" => false,
            "diabetes" => false,
            "osteoporosis" => false,
            "ojt_marks" => 80,
            "date_started" => now()->subMonths(7),
            "date_completed" => now()->subMonths(1),

            // Foreign keys
            "pensyarah_penilai_id" => 1,// CG FAIZAH
            "pensyarah_penilai_ojt_id" => 1, // CG RIDZUAN
            "penyelaras_program_id" => 1, // SYAHIR MANSOR
            "skop_kerja_id" => SkopKerja::factory()->create([
                "document_name" => "JOB_DESCRIPTION.pdf",
                "document_path" => "Pelajar_AKV0222KA003/ORGANISASI_LATIHAN/JOB_DESCRIPTION.pdf",
            ]),
        ]);

        Pelajar::factory()->times(10)->create();

        // Pelajar::factory()->create([
        //     "user_id" => 106,
        //     "matrix_number" => "AKV0222KA010",
        //     "block" =>	"A",
        //     "dorm" => "201",	
        //     "study_type" =>	"DVM",
        //     "semester" =>	4,
        //     "status" =>	"Belum_OJT",
        //     "nric_number" => "040916080159",
        //     "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
        //     "guardian_telephone_number" => "0165190476",
        //     "linkedin_url" => "",
        //     "facebook_url" => "",
        //     "github_url" => "",
        //     "program" => "KPD",
        //     "heart_disease" => false,
        //     "asthma" => false,
        //     "diabetes" => false,
        //     "osteoporosis" => false,

        //     // Foreign keys
        //     "pensyarah_penilai_id" => 1,
        //     "pensyarah_penilai_ojt_id" => 1,
        //     "penyelaras_program_id" => 1,
        //     "skop_kerja_id" => 2,
        // ]);

        // Pelajar::factory()->create([
        //     "user_id" => 111,
        //     "matrix_number" => "AKV0222KA011",
        //     "block" =>	"A",
        //     "dorm" => "201",	
        //     "study_type" =>	"DVM",
        //     "semester" =>	4,
        //     "status" =>	"Belum_OJT",
        //     "nric_number" => "040916080159",
        //     "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
        //     "guardian_telephone_number" => "0165190476",
        //     "linkedin_url" => "",
        //     "facebook_url" => "",
        //     "github_url" => "",
        //     "program" => "KPD",
        //     "heart_disease" => false,
        //     "asthma" => false,
        //     "diabetes" => false,
        //     "osteoporosis" => false,
        //     "ojt_marks" => 100,

        //     // Foreign keys
        //     "pensyarah_penilai_id" => 1,
        //     "pensyarah_penilai_ojt_id" => 1,
        //     "penyelaras_program_id" => 1,
        //     "skop_kerja_id" => 2,
        // ]);

        // Pelajar::factory()->create([
        //     "user_id" => 108,
        //     "matrix_number" => "AKV0222KA012",
        //     "block" =>	"A",
        //     "dorm" => "201",	
        //     "study_type" =>	"DVM",
        //     "semester" =>	4,
        //     "status" =>	"Belum_OJT",
        //     "nric_number" => "040916080159",
        //     "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
        //     "guardian_telephone_number" => "0165190476",
        //     "linkedin_url" => "",
        //     "facebook_url" => "",
        //     "github_url" => "",
        //     "program" => "KPD",
        //     "heart_disease" => false,
        //     "asthma" => false,
        //     "diabetes" => false,
        //     "osteoporosis" => false,

        //     // Foreign keys
        //     "pensyarah_penilai_id" => 1,
        //     "pensyarah_penilai_ojt_id" => 1,
        //     "penyelaras_program_id" => 1,
        //     "skop_kerja_id" => 2,
        // ]);

        // Pelajar::factory()->create([
        //     "user_id" => 109,
        //     "matrix_number" => "AKV0222KA013",
        //     "block" =>	"A",
        //     "dorm" => "201",	
        //     "study_type" =>	"DVM",
        //     "semester" =>	4,
        //     "status" =>	"Belum_OJT",
        //     "nric_number" => "040916080159",
        //     "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
        //     "guardian_telephone_number" => "0165190476",
        //     "linkedin_url" => "",
        //     "facebook_url" => "",
        //     "github_url" => "",
        //     "program" => "KPD",
        //     "heart_disease" => false,
        //     "asthma" => false,
        //     "diabetes" => false,
        //     "osteoporosis" => false,

        //     // Foreign keys
        //     "pensyarah_penilai_id" => 1,
        //     "pensyarah_penilai_ojt_id" => 1,
        //     "penyelaras_program_id" => 1,
        //     "skop_kerja_id" => 2,
        // ]);
    }
}
