<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RelasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dokter_id'=> $this->faker->randomDigitNot(0),
            'klinik_id'=> $this->faker->randomDigitNot(0),

            
        ];
    }
}
