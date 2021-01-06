<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entidade::class;

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