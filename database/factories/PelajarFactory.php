<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelajar>
 */
class PelajarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i = 0;

        return [
            "date_started" => now(),
            "date_completed" => now(),
            "created_at" => now(),
            "updated_at" => now(),
            "cohort" => now(),
            "matrix_number" => "AKV0222KA0".($i++),
            'semester' => $this->faker->randomDigit, // Or any other logic to generate a semester value
            'nric_number' => $this->faker->randomNumber(9),
            'program' => $this->faker->randomElement(['KPD', 'KSK', 'MTK', 'BPP', 'BAP', 'HBP', 'WTP']),

            'user_id' => User::factory(),
            "block" =>	"A",
            "dorm" => "201",	
            "study_type" =>	"DVM",
            "status" =>	"Belum_OJT",
            "guardian" => "NUR ZHAFIRAH AQILAH BINTI MUHAMMAD",
            "guardian_telephone_number" => "0165190476",
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "heart_disease" => false,
            "asthma" => false,
            "diabetes" => false,
            "osteoporosis" => false,

            // Foreign keys
            // "pensyarah_penilai_id" => 1,
            // "pensyarah_penilai_ojt_id" => 1,
            // "penyelaras_program_id" => 1,
            // "skop_kerja_id" => 1,
        ];
    }
}
