<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' =>Str::random(10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'company_name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'post' => $this->faker-> Str::random(10)

        ];
    }
}
