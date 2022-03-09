<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_name' => $this->faker->words(2, true),
            'address1' => $this->faker->words(2, true),
            'address2' => $this->faker->words(2, true),
            'city' => $this->faker->words(1, true),
            'state' => $this->faker->words(1, true),
            'country' => $this->faker->words(1, true),
            'latitude' => 1.232,
            'longitude' => 1.555,
            'phone_no1' => $this->faker->unique()->phoneNumber,
            'phone_no2' => $this->faker->unique()->phoneNumber,
            'status' => 'Active',
            'start_validity' => now(),
            'end_validity' => now(),
            'created_at' => now(),
        ];
    }
}
