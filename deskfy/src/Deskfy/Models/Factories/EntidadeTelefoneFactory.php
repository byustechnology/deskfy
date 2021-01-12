<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Deskfy\Models\EntidadeTelefone;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntidadeTelefoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EntidadeTelefone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entidade_id' => Entidade::factory(), 
            'valor' => $this->faker->numerify('##########'), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}