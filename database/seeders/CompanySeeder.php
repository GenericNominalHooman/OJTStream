<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->create([
            "comp_type" => "university",
            "comp_name" => "Company Name 1",
            "comp_address_street" => "Company St 1",
            "comp_address_city" => "Company City 1",
            "comp_address_province" => "Province 1",
            "comp_contact" => "11111",
            "ojt_supervisor" => "Mr ABC",
            "students_deployed_count" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ]);
    }
}
