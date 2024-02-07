<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\PelajarSeeder;
use Database\Seeders\JanjiTemusSeeder;
use Database\Seeders\PelajarsCompanySeeder;
use Database\Seeders\JanjiTemuPelajarSeeder;
use Database\Seeders\PensyarahPenilaiSeeder;
use Database\Seeders\PelajarJanjiTemusSeeder;
use Database\Seeders\PenyelarasProgramSeeder;
use Database\Seeders\PensyarahPenilaiOJTSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@material.com',
            'password' => ('secret')
        ]);

        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            PensyarahPenilaiOJTSeeder::class,
            PensyarahPenilaiSeeder::class,
            PenyelarasProgramSeeder::class,
            KupliSeeder::class,
            PelajarSeeder::class,
            JanjiTemusSeeder::class,
            JanjiTemuPelajarSeeder::class,
            PelajarJanjiTemusSeeder::class,
            PelajarsCompanySeeder::class,
            DokumenOJTSeeder::class,
        ]);
    }
}
