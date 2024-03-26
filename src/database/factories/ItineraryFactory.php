<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itinerary>
 */
class ItineraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['beach', 'river', 'monument'];

        return [
            'title' => $this->faker->word,
            'category' => $categories[array_rand($categories)],
            'duration' => $this->faker->randomDigit(),
            'image' => $this->faker->imageUrl(),
            'destinations' => [
                [
                    'name' => $this->faker->word,
                    'lodging' => $this->faker->word
                ]
            ],
            'user_id' => User::factory()
        ];
    }
}
