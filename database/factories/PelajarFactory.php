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
        // Default pelajar is sebelum ojt pelajar
        
        static $user_id = 503; // 500 is reserved for MUHAMMAD ISKANDAR LUQMAN, 501 is reserved for KAMARUL ABRAR BIN NORDIN, 502 is reserved for AHMAD AKID BIN ABD RAHMAN
        static $i = 4; // 1 is reserved for MUHAMMAD ISKANDAR LUQMAN, 2 is reserved for KAMARUL ABRAR BIN NORDIN, 3 is reserved for AHMAD AKID BIN ABD RAHMAN

        $i++;

        if($i < 10){
            $i = "0"."$i";
        }
        
        return [
            "date_started" => now()->addMonth(),
            "date_completed" => now()->addMonths(7),
            "created_at" => now(),
            "updated_at" => now(),
            "cohort" => now()->format("Y"),
            "matrix_number" => "AKV0222KA0".($i),
            'semester' => $this->faker->randomElement([1,2,3,4,5,6,6,7,8]), // Or any other logic to generate a semester value
            'nric_number' => $this->faker->randomNumber(9).$this->faker->randomNumber(3),
            'program' => $this->faker->randomElement(['KPD', 'KSK', 'MTK', 'BPP', 'BAP', 'HBP', 'WTP']),

            'user_id' => User::factory([
                "username" => "Pelajar ".$i, 
                "name" => $this->faker->name(),
            ]),

            "block" =>	$this->faker->randomElement(["A", "B", "C", "D", "E", "F", "G"]),
            "dorm" => $this->faker->randomElement(['201','202','203','204','301','302','303','304']),	
            "study_type" =>	$this->faker->randomElement(["DVM", "SVM"]),
            "status" =>	'Belum_OJT',
            // "status" =>	$this->faker->randomElement(['Belum_OJT', 'Sedang_OJT', 'Selesai_OJT']),
            "guardian" => $this->faker->name(),
            "guardian_telephone_number" => $this->faker->phoneNumber(),
            "linkedin_url" => "",
            "facebook_url" => "",
            "github_url" => "",
            "heart_disease" => $this->faker->randomElement([false, true]),
            "asthma" => $this->faker->randomElement([false, true]),
            "diabetes" => $this->faker->randomElement([false, true]),
            "osteoporosis" => $this->faker->randomElement([false, true]),
        ];
    }
}
