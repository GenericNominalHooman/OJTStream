<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
class Pensyarah_Penilai_OJTFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $user_id = 302; // 300 is reserved for CG RIDZUAN, 301 is reserved for CG FARAHANA
        static $i = 1;
        
        return [
            "user_id" => User::factory()->create([
                "id" => $user_id++,
                "username" => "Pesyarah Penilai OJT ".$i++,
            ]),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
