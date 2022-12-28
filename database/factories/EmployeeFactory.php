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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'gender' => 'M',
            'address' => $this->faker->address(),
            'contact' => $this->faker->phoneNumber(),
            'salary' => $this->faker->numberBetween(1000, 3000),
            'start_date' => now(),
        ];
    }
}
