<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Passport>
 */
class PassportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->unique()->numberBetween(1,10),
            'passport_number' => fake()->numberBetween(10000,99999),
            'issued_date' =>fake()->date(),
            'expiry_date' =>fake()->date(),
        ];
    }
}
