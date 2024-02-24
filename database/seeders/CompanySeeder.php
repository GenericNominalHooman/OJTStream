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
        Company::factory()->times(3)->create();
        // $table->enum('type', ['public', 'private'])->default('private');
        // $table->string('name', 32);
        // $table->string('address')->nullable();
        // $table->string('telephone', 32);
        // $table->string('email');

        // $table->string('ojt_supervisor', 64);

        // $table->integer('students_deployed_count')->default(0);
        // $table->timestamps();

    }
}
