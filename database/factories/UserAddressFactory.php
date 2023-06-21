<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = City::inRandomOrder()->first();

        return [
            'country_id' => $city->state->country_id,
            'state_id' => $city->state_id,
            'city_id' => $city->id,
            'street' => fake()->streetName,
            'house' => fake()->buildingNumber,
            'flat' => fake()->boolean ?: fake()->numberBetween(0, 100),
            'postal_code' => fake()->postcode,
        ];
    }
}
