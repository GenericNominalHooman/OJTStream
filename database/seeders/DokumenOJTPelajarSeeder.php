<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenOJTPelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenOJTPelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PELAJAR AKV0222KA001 | BELUM OJT
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 500,
"document_path" => null,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05(A).pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ20.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ21.pdf",
            "pelajar_id" => 500,
"document_path" => null,
            "dokumen_ojt_id" => 13,
        ]);

        // PELAJAR AKV0222KA002 | SEDANG OJT
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT01.pdf",
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT02.pdf",
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "Buku Panduan.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/Buku Panduan.pdf",
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT03.pdf",
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT04.pdf",
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT05.pdf",
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05(A).pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOTJ05(A).pdf",
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT06.pdf",
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT07.pdf",
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT08.pdf",
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 501,
"document_path" => "/Pelajar_AKV0222KA002/KVOJT/KVOJT09.pdf",
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ20.pdf",
            "pelajar_id" => 501,
"document_path" => null,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ21.pdf",
            "pelajar_id" => 501,
"document_path" => null,
            "dokumen_ojt_id" => 13,
        ]);
        
        // PELAJAR AKV0222KA003 | TAMAT OJT
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT01.pdf",
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT02.pdf",
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "Buku Panduan.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/Buku Panduan.pdf",
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT03.pdf",
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT04.pdf",
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT05.pdf",
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05(A).pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOTJ05(A).pdf",
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT06.pdf",
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT07.pdf",
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT08.pdf",
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT09.pdf",
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ20.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT20.pdf",
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ21.pdf",
            "pelajar_id" => 502,
"document_path" => "/Pelajar_AKV0222KA003/KVOJT/KVOJT21.pdf",
            "dokumen_ojt_id" => 13,
        ]);
    }
}
