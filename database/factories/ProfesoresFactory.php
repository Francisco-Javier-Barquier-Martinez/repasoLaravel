<?php

namespace Database\Factories;

use App\Models\Profesores;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profesores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName($gener = 'male' | 'female'),
            'apellidos' => $this->faker->lastName,
            'email' => $this->faker->unique()->email,
            'localidad' => $this->faker->streetAddress
        ];
    }
}
