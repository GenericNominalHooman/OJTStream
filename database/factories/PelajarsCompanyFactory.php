<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Pelajar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelajarsCompany>
 */
class PelajarsCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "created_at" => now(),
            "updated_at" => now(),
            "ojt_begin_date" => now(),
            "ojt_end_date" => now()->addMonths(6),
            'pelajar_id' => Pelajar::factory(),
            'company_id' => Company::factory(),
            'role' => $this->faker->word(),        
        ];
    }
}
