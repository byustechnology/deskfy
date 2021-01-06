<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->bothify('#####-??'), 
            'titulo' => $this->faker->sentence(3), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}