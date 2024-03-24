<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenOJTPelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenOJTPelajarSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PELAJAR AKV0222KA002 | SEDANG OJT
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 501,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ10.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ11.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ12.pdf",
            "pelajar_id" => 501,
            "dokumen_ojt_id" => 13,
        ]);
    }
}
