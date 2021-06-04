<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'zipcode' => $this->faker->postcode,
            'region' => $this->faker->state,
            'city' => $this->faker->city,
            'status' => $this->faker->boolean($chanceOfGettingTrue = 100)
        ];
    }
}
