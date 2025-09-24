<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'John Doe', 'Jane Smith', 'Michael Johnson', 'Emily Davis', 'Daniel Garcia', 'Sophia Martinez',
                'David Lee', 'Olivia Brown', 'James Wilson', 'Isabella Taylor', 'Ethan Anderson', 'Mia Thomas',
                'Alexander White', 'Amelia Harris', 'Benjamin Clark', 'Charlotte Lewis', 'William Robinson',
                'Abigail Walker', 'Henry Hall', 'Ella Young', 'Matthew Allen', 'Grace King', 'Joseph Wright',
                'Hannah Scott', 'Christopher Green', 'Lily Baker', 'Andrew Adams', 'Chloe Nelson', 'Joshua Carter',
                'Zoe Mitchell', 'Samuel Perez', 'Victoria Roberts', 'Nicholas Turner', 'Scarlett Phillips',
                'Logan Campbell', 'Aria Parker', 'Anthony Evans', 'Layla Edwards', 'Gabriel Collins', 'Nora Stewart'
            ]),
            'birth_date' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];

    }
}
