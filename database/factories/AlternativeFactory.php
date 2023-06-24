<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alternative;
use App\Models\User;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlternativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alternative_name' => fake()->word(),
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'slug' => fake()->word(),
            'alamat' => fake() -> sentence(),
            'contact' => fake() -> randomDigitNotNull(),
            'img_url' => fake() -> imageUrl(640, 480, 'animals', true),
            'available_status' => fake() -> boolean(),
            'tenor_tahun_cicilan' => fake() -> randomDigitNotNull(),
            'latitude' => fake() -> randomFloat(1, 20, 30),
            'longitude' => fake() -> randomFloat(1, 20, 30),
            'C1' => fake() -> randomFloat(1, 200000, 3000000),
            'C2' => fake() -> randomFloat(1, 20000, 300000),
            'C3' => fake() -> randomFloat(1, 20000, 300000),
            'C4' => fake() -> randomFloat(1, 20000, 300000),
            'C5' => fake() -> randomFloat(1, 20, 30),
            'C6' => fake() -> randomFloat(1, 20, 30),
            'C7' => fake() -> randomFloat(1, 20, 30),
            'C8' => fake() -> randomFloat(1, 20, 30),
            'C9' => fake() -> randomFloat(1, 20, 30),
            'C10' => fake() -> randomFloat(1, 20, 30),
            'C11' => fake() -> randomFloat(1, 20, 30),
            'C12' => fake() -> randomDigitNotNull(),
            'C13' => fake() -> randomFloat(1, 450, 1300),
            'C14' => fake() -> randomFloat(1, 20, 100),
            'C15' => fake() -> randomFloat(1, 20, 100),
            'C16' => fake() -> randomDigitNotNull(),
            'C17' => fake() -> randomDigitNotNull(),
            'C18' => fake() -> randomDigitNotNull(),
            'C19' => fake() -> randomFloat(1, 20, 30),
            'C20' => fake() -> randomFloat(1, 20, 30),
        ];
    }
}
