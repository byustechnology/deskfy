<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Deskfy\Models\EntidadeEmail;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntidadeEmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EntidadeEmail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entidade_id' => Entidade::factory(), 
            'valor' => $this->faker->email, 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}