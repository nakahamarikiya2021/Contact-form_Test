<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastname(),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->randomNumber(),
            'gender' => $this->faker->numberBetween(1, 3),
            'address' => $this->faker->address(),
            'building' => $this->faker->word(),
            'detail' => $this->faker->sentence(),
        ];
    }
}
