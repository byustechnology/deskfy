<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Deskfy\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entidade_id' => Entidade::factory(), 
            'titulo' => $this->faker->sentence(3), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}