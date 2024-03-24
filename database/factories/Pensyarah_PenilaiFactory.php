<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pensyarah_Penilai>
 */
class Pensyarah_PenilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $user_id = 401; // 400 is reserved for CG FAIZAH
        static $i = 1;
        
        return [
            "user_id" => User::factory()->create([
                "id" => $user_id++,
                "username" => "Pesyarah Penilai ".$i++,
            ]),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
