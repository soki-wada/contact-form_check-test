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
        $tel1 = ['090', '080', '070'];

        return [
            //
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->lastName,
            'last_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->randomElement($tel1) . $this->faker->numerify('########'),
            'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'building' => $this->faker->word . $this->faker->numerify('###'),
            'detail' => $this->faker->realText(100, 3)
        ];
    }
}
