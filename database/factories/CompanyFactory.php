<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'logo' => $this->faker->imageUrl,
            'address' => $this->faker->address,
            'founded_at' => $this->faker->date,
        ];
    }
}
