<?php

namespace Database\Factories;

use App\Models\Friendship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
use Faker\Generator as Faker;
class FriendshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Friendship::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10), // Replace 10 with the maximum user_id in your users table
            'friend_id' => $this->faker->numberBetween(1, 10), // Replace 10 with the maximum user_id in your users table
            'status' => $this->faker->randomElement(['pending', 'accepted']),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
