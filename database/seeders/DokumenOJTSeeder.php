<?php

namespace Database\Seeders;

use App\Models\DokumenOJT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumenOJTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DokumenOJT::factory()->create([
            "document_name" => "KVOJT01.pdf",
            "document_path" => "KVOJT/KVOJT01.pdf",
            "document_description" => "Dokumen biodata pelajar OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT02.pdf",
            "document_path" => "KVOJT/KVOJT02.pdf",
            "document_description" => "Borang Pendaftaran OJT",
        ]);
        
        DokumenOJT::factory()->create([
            "document_name" => "Buku Panduan.pdf",
            "document_path" => "KVOJT/Buku Panduan.pdf",
            "document_type" => "infomasi",
            "document_description" => "Buku Panduan OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT03.pdf",
            "document_path" => "KVOJT/KVOJT03.pdf",
            "document_description" => "Aku Janji Pelajar",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT04.pdf",
            "document_path" => "KVOJT/KVOJT04.pdf",
            "document_description" => "Borang Permohonan Penempatan OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT05(A).pdf",
            "document_path" => "KVOJT/KVOJT05(A).pdf",
            "document_description" => "Pembatalan Penempatan OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT05.pdf",
            "document_path" => "KVOJT/KVOJT05.pdf",
            "document_description" => "Borang Tawaran Tempat OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT06.pdf",
            "document_path" => "KVOJT/KVOJT06.pdf",
            "document_description" => "Akuan Lepas Tanggung",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT07.pdf",
            "document_path" => "KVOJT/KVOJT07.pdf",
            "document_description" => "Pengesahan Perlaksanaan OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT08.pdf",
            "document_path" => "KVOJT/KVOJT08.pdf",
            "document_description" => "Pengesahan Pelatih PPO Dan PP",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT09.pdf",
            "document_path" => "KVOJT/KVOJT09.pdf",
            "document_description" => "Kad Lapor Diri Pelajar",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT20.pdf",
            "document_path" => "KVOJT/KVOJT20.pdf",
            "document_description" => "Pencapaian Prestasi OJT",
        ]);

        DokumenOJT::factory()->create([
            "document_name" => "KVOJT21.pdf",
            "document_path" => "KVOJT/KVOJT21.pdf",
            "document_description" => "Pengesahan Tamat",
        ]);
    }
}
