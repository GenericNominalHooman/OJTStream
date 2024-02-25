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
        ]);

        PelajarsCompany::factory()->create([
            "role" => "Media Department Internship",
            "pelajar_id" => 106,
            "company_id" => 2,
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
    }
}
