<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penyeleras_Program>
 */
class Penyelaras_ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $user_id = 201; // 200 is reserved for CG SYAHIR
        static $i = 1;

        return [
            "user_id" => User::factory()->create([
                "id" => $user_id++,
                "username" => "Penyelaras Program ".$i++,
            ]),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
