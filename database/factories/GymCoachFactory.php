<?php

namespace Database\Factories;

use App\Models\Gym;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=GymCoach>
 */
class GymCoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gym_id' => $this->faker->randomElement(Gym::all())['id'],
            'user_id' => $this->faker->randomElement(
                User::role('coach')->get()

            )['id']
        ];
    }
}
