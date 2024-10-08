<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'phone' => substr(fake()->phoneNumber(), 0, 15),
            'date_of_birth' => fake()->date(),
            'hire_date' => fake()->dateTime(),
            'salary' => fake()->numberBetween(1000000,10000000),
            'is_active' => fake()->numberBetween(0,1),
            'department_id' => fake()->numberBetween(1,10000),
            'manager_id' => fake()->numberBetween(1,10000),
            'address' => fake()->address()
            // 'profile_picture' => fake()
        ];
    }
}
