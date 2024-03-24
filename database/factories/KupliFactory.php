<?php

namespace Database\Factories;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kupli>
 */
class KupliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $user_id = 3; // 2 is reserved for Kamasuriati
        static $i = 0;

        return [
            "user_id" => User::factory()->create([
                "id" => $user_id++,
                "username" => "KULPI ".$i++,
            ]),
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
