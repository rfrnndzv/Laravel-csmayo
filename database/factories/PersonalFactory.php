<?php

namespace Database\Factories;

use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ciPersonal' => $this->faker->randomNumber(),
            'usuario' => $this->faker->name(8),
            'contrasenia' => '123',
            'nivel' => $this->faker->randomDigit(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
