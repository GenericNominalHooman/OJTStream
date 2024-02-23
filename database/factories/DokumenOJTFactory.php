<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenOJT>
 */
class DokumenOJTFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $i = 1;
        return [
            "created_at" => now(),
            "updated_at" => now(),
            "kupli_id" => 1,
            "document_name" => "KVOJT0".$i.".pdf",
            "document_description" => $this->faker->sentences(10),
            "document_path" => "KVOJT/KVOJT0".$i.".pdf",
            "document_type" => "pengisian",
        ];
        $i++;
    }
}
