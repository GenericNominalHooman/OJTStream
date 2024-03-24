<?php

namespace Database\Seeders;

use App\Models\Pensyarah_Penilai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\PelajarSeeder;
use Database\Seeders\SkopKerjaSeeder;
use Database\Seeders\JanjiTemusSeeder;
use Database\Seeders\PelajarsCompanySeeder;
use Database\Seeders\JanjiTemuPelajarSeeder;
use Database\Seeders\PensyarahPenilaiSeeder;
use Database\Seeders\DokumenOJTPelajarSeeder;
use Database\Seeders\PelajarJanjiTemusSeeder;
use Database\Seeders\PenyelarasProgramSeeder;
use Database\Seeders\PensyarahPenilaiOJTSeeder;
use Database\Seeders\KetuaJabatanDanKetuaProgramSeeder;

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

        // $this->call([
        //     UserSeeder::class,
        //     CompanySeeder::class,
        //     PensyarahPenilaiOJTSeeder::class,
        //     PensyarahPenilaiSeeder::class,
        //     PenyelarasProgramSeeder::class,
        //     KupliSeeder::class,
        //     SkopKerjaSeeder::class,
        //     PelajarSeeder::class,
        //     JanjiTemusSeeder::class,
        //     JanjiTemuPelajarSeeder::class,
        //     PelajarJanjiTemusSeeder::class,
        //     PelajarsCompanySeeder::class,
        //     DokumenOJTSeeder::class,
        //     DokumenOJTPelajarSeeder::class,
        //     PengugumanSeeder::class,
        //     KetuaJabatanDanKetuaProgramSeeder::class,
        // ]);

        // $this->call([
        //     DokumenOJTPelajarSeeder::class,
        // ]);
        $this->call([
            // Users seeder
            KupliSeeder::class,
            KetuaJabatanDanKetuaProgramSeeder::class,
            PenyelarasProgramSeeder::class,   
            PensyarahPenilaiOJTSeeder::class,   
            PensyarahPenilaiSeeder::class,
            PelajarSeeder::class,

            // OJT seeder
            CompanySeeder::class,
            PelajarsCompanySeeder::class,
            JanjiTemusSeeder::class,
            JanjiTemuPelajarSeeder::class,
            DokumenOJTSeeder::class,
            DokumenOJTPelajarSeeder::class,
            // DokumenOJTPelajarSeeder2::class,
            // DokumenOJTPelajarSeeder3::class,

            // Penguguman
            PengugumanSeeder::class,
        ]);
    }
}
