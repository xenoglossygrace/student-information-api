<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pick a ramdom course name
         $courseName = $this->faker->randomElement([
            'Introduction to Programming', 'Data Structures and Algorithms', 'Database Management Systems',
            'Operating Systems', 'Computer Networks', 'Web Development', 'Software Engineering',
            'Artificial Intelligence', 'Machine Learning', 'Cybersecurity Fundamentals',
            'Cloud Computing', 'Human-Computer Interaction', 'Digital Logic Design',
            'Mobile Application Development', 'Computer Graphics', 'Game Development', 'Data Science',
            'IT Project Management', 'Business Analytics', 'E-Commerce Systems', 'Information Security Management',
            'Systems Analysis and Design', 'Computer Architecture', 'Network Security', 'Programming Languages',
            'Compiler Design', 'Big Data Analytics', 'Parallel and Distributed Computing', 'Robotics and Automation',
            'Natural Language Processing', 'Bioinformatics', 'Augmented Reality', 'Virtual Reality Development',
            'Embedded Systems', 'Cloud Security', 'Blockchain Technology', 'DevOps Engineering', 'Digital Forensics',
            'Quantum Computing', 'Ethical Hacking'
        ]);

        // Generate a course code from initials + random number
        $initials = collect(explode(' ', $courseName))->map(fn($word) => strtoupper(substr($word, 0, 1)))->implode('');

        $courseCode = $initials . '-' . $this->faker->unique()->numberBetween(100, 999);

        return [
            'course_code' => $courseCode,
            'course_name' => $courseName,
            'description' => $this->faker->sentence(12),
            'units' => $this->faker->numberBetween(2, 5),
        ];
    }
}
