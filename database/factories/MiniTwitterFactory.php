<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class MiniTwitterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        return [
            'vorname' => $this->faker->name(),
            'nachname' => $this->faker->name(),
            'email' => $this->faker->email(),

            'tweet_title' => $this->faker->sentence(),

            'tweet_text' => $this->faker->sentence(4)



        ];
    }
}
