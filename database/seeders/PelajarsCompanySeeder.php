<?php

namespace Database\Seeders;

use App\Models\PelajarsCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajarsCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PelajarsCompany::factory()->create([
            "role" => "IT Department Internship",
            "pelajar_id" => 105,
            "company_id" => 1,
        ]);
    }
}
