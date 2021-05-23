<?php

namespace Database\Factories;

use App\Models\asignaturas;
use App\Models\Profesores;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = asignaturas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesor = Profesores::all('id');
        return [
            'nombre' => $this->faker->randomElement(['PHP', 'JavaScript', 'DiWeb', 'DaWeb', 'HLC']),
            'descripcion' => $this->faker->text,
            'creditos' => $this->faker->randomDigitNot(0),
            'profesor_id' => $profesor->get(rand(0, count($profesor) - 1))
        ];
    }
}
