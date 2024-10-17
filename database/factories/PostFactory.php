<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'skills' => $this->generateSkillRequirements(),
            'description' => fake()->text(),
            'work_time' => fake()->randomNumber(1,24),
            'salary' => fake()->numberBetween(1000, 10000),
            'user_id' => User::all()->random()->id,
        ];
    }

    /**
     * Generate a random skill requirement list.
     *
     * @return string
     */
    private function generateSkillRequirements(): string
    {
        $skills = [
            'JavaScript', 'PHP', 'Laravel', 'React', 'Node.js',
            'Project Management', 'Communication', 'Leadership',
            'Problem Solving', 'UI/UX Design', 'Python', 'Java',
            'C++', 'SQL', 'Data Analysis', 'SEO', 'Machine Learning'
        ];

        // Randomly pick 3-5 skills from the list
        $selectedSkills = fake()->randomElements($skills, rand(3, 5));

        // Return them as a comma-separated string
        return implode(', ', $selectedSkills);
    }
}
