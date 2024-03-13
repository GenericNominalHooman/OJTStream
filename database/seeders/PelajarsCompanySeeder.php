<?php

namespace Database\Seeders;

use App\Models\Pelajar;
use App\Models\PelajarsCompany;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelajarsCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // BIND ON PELAJARS COMPANY
        PelajarsCompany::factory()->create([
            "role" => "IT Department Internship",
            "pelajar_id" => 105,
            "company_id" => 1,
            "ojt_begin_date" => now()->subDays(2),
            "ojt_end_date" => now()->subDays(1),
        ]);

        PelajarsCompany::factory()->create([
            "role" => "Media Department Internship",
            "pelajar_id" => 106,
            "company_id" => 2,
            "ojt_begin_date" => now()->subMonths(3),
            "ojt_end_date" => now()->addMonths(3),
        ]);

        PelajarsCompany::factory()->create([
            "role" => "Software Development Internship",
            "pelajar_id" => 111,
            "company_id" => 3,
            "ojt_begin_date" => now()->addMonths(1),
            "ojt_end_date" => now()->addMonths(7),
        ]);

        // BIND ON PELAJAR TABLE
        $pelajar_akv0222ka009 = Pelajar::find(105);

        if($pelajar_akv0222ka009){
            $pelajar_akv0222ka009->update([
                "pelajar_company_id" => 1,
            ]);
        }

        $pelajar_akv0222ka010 = Pelajar::find(106);

        if($pelajar_akv0222ka010){
            $pelajar_akv0222ka010->update([
                "pelajar_company_id" => 2,
            ]);
        }

        $pelajar_akv0222ka011 = Pelajar::find(111);

        if($pelajar_akv0222ka011){
            $pelajar_akv0222ka011->update([
                "pelajar_company_id" => 3,
            ]);
        }
    }
}
