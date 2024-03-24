<?php

namespace Database\Factories;

use App\Models\Pelajar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenOJTPelajar>
 */
class DokumenOJTPelajarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i = 1;

        return [
             "created_at" => now(),
             "updated_at" => now(),
             "deadline_date" => now()->addDays($i),
             "submitted_at" => now(),
             "pelajar_id" => 502,
             "document_name" => "KVOJT0".($i++).".pdf",
             "document_path" => "/Pelajar_".Pelajar::factory()->create()->no_matrik."/",
             "dokumen_ojt_id" => 1,
        ];
    }
}
