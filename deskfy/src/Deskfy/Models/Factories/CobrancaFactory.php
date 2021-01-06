<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Cobranca;
use Deskfy\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class CobrancaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cobranca::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'servico_id' => Servico::factory(), 
            'titulo' => $this->faker->sentence(3), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}