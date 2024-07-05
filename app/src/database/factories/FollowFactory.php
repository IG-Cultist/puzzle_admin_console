<?php

namespace Database\Factories;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FollowFactory extends Factory
{
    protected $model = Follow::class;

    public function definition(): array
    {
        $scheduled_date = $this->faker->dateTimeBetween('+1day', '+1year');
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'follow_id' => $this->faker->numberBetween(1, 100),
            'created_at' => $scheduled_date->format('Y-m-d H:i:s'),
            'updated_at' => $scheduled_date->modify('+1hour')->format('Y-m-d H:i:s')
        ];

    }
}
