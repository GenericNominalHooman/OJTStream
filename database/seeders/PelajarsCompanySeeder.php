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
        // KAMARUL ABRAR BIN NORDIN
        PelajarsCompany::factory()->create([
            "role" => "IT Department Internship",
            "pelajar_id" => 501,
            "company_id" => 1,
            "ojt_begin_date" => now()->subMonths(1),
            "ojt_end_date" => now()->addMonths(5),
        ]);

        // AHMAD AKID BIN ADB RAHMAN
        PelajarsCompany::factory()->create([
            "role" => "IT Department Internship",
            "pelajar_id" => 502,
            "company_id" => 1,
            "ojt_begin_date" => now()->addMonths(7),
            "ojt_end_date" => now()->addMonths(1),
        ]);

        // BIND ON PELAJAR TABLE
        $pelajar_akv0222ka002 = Pelajar::find(501);

        if($pelajar_akv0222ka002){
            $pelajar_akv0222ka002->update([
                "pelajar_company_id" => 1,
            ]);
        }

        $pelajar_akv0222ka003 = Pelajar::find(502);

        if($pelajar_akv0222ka003){
            $pelajar_akv0222ka003->update([
                "pelajar_company_id" => 2,
            ]);
        }
    }
}
