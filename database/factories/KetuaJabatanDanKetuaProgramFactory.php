<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KetuaJabatanDanKetuaProgram>
 */
class KetuaJabatanDanKetuaProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $user_id = 1000;
        static $i = 1;
        
        return [
            "user_id" => User::factory()->create([
                "id" => $user_id++,
                "username" => "KPKJ ".$i++,
            ]),
        ];
    }
}
