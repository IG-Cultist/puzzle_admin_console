<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\UserItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserItem>
 */
class UserItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UserItem::class;

    public function definition(): array
    {
        $scheduled_date = $this->faker->dateTimeBetween('+1day', '+1year');
        return [
            'user_id' => $this->faker->numberBetween(1, 100),
            'item_id' => $this->faker->numberBetween(1, 4),
            'item_num' => $this->faker->numberBetween(1, 100),
            'created_at' => $scheduled_date->format('Y-m-d H:i:s'),
            'updated_at' => $scheduled_date->modify('+1hour')->format('Y-m-d H:i:s')
        ];
    }
}
