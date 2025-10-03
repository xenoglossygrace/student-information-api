<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 100), // Assuming you have 100 students
            'name' => $this->faker->name(),
            'course_id' => $this->faker->numberBetween(1, 100), // Assuming you have 50 courses
            'semester' => $this->faker->randomElement(['1st', '2nd', 'Summer Class']),
            'year' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
            'block' => $this->faker->numberBetween(1, 2, 3, 4, 5),
            'status' => $this->faker->randomElement(['enrolled', 'completed', 'dropped']),
            'grade' => $this->faker->randomElement(['1.00', '1.25', '1.50', '1.75', 
                '2.00', '2.25', '2.50', '2.75', 
                '3.00', '4.00', '5.00']),
        ];
    }
}
