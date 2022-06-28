<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName(),
            'house_number' => $this->faker->numberBetween(1, 100),
            'house_number_suffix' => null,
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'user_id' => null,
        ];
    }
}
