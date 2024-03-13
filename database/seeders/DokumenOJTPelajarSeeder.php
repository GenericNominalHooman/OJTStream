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
        // PELAJAR AKV0222KA009
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 105,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ10.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ11.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ12.pdf",
            "pelajar_id" => 105,
            "dokumen_ojt_id" => 13,
        ]);
        
        // PELAJAR AKV0222KA009
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 106,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
            "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT01.pdf",
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 2,
            "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT02.pdf",
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 3,
            "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT03.pdf",
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ10.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ11.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ12.pdf",
            "pelajar_id" => 106,
            "dokumen_ojt_id" => 13,
        ]);

        // PELAJAR AKV0222KA009
        // DokumenOJTPelajar::factory()->create([
        //     "pelajar_id" => 107,
        //     "document_name" => "KVOTJ01.pdf",
        //     "dokumen_ojt_id" => 1,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT01.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ02.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 2,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT02.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ03.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 3,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT03.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ04.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 4,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT04.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ05.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 5,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT05.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ05(A).pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 5,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT05(A).pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ06.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 6,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT06.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ07.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 7,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT07.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ08.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 8,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT08.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ09.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 9,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT09.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ20.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 10,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT20.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ21.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 11,
        //     "document_path" => "Pelajar_AKV0222KA010/KVOJT/KVOJT21.pdf",
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ11.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 12,
        // ]);
        // DokumenOJTPelajar::factory()->create([
        //     "document_name" => "KVOTJ12.pdf",
        //     "pelajar_id" => 107,
        //     "dokumen_ojt_id" => 13,
        // ]);

        // PELAJAR AKV0222KA009
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 111,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ10.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ11.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ12.pdf",
            "pelajar_id" => 111,
            "dokumen_ojt_id" => 13,
        ]);

        // PELAJAR AKV0222KA009
        DokumenOJTPelajar::factory()->create([
            "pelajar_id" => 109,
            "document_name" => "KVOTJ01.pdf",
            "dokumen_ojt_id" => 1,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ02.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 2,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ03.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 3,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ04.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 4,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ05.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 5,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ06.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 6,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ07.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 7,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ08.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 8,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 9,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ09.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 10,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ10.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 11,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ11.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 12,
        ]);
        DokumenOJTPelajar::factory()->create([
            "document_name" => "KVOTJ12.pdf",
            "pelajar_id" => 109,
            "dokumen_ojt_id" => 13,
        ]);
    }
}
