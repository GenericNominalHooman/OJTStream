<?php

namespace Database\Seeders;

use App\Models\Pelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajarJanjiTemusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LINK JANJI_TEMUS_PELAJARS TO AKV0222KA009
        $pelajar_akv0222ka009 = Pelajar::find(105);

        if($pelajar_akv0222ka009){
            $pelajar_akv0222ka009->update([
                "janji_temu_1" => 1,
                "janji_temu_2" => 2,
            ]);
        }

        // LINK JANJI_TEMUS_PELAJARS TO AKV0222KA010
        // $pelajar_akv0222ka010 = Pelajar::find(106);

        // if($pelajar_akv0222ka010){
        //     $pelajar_akv0222ka010->update([
        //         "janji_temu_2" => 2,
        //     ]);
        // }
    }
}
