<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Cobranca;
use Deskfy\Models\CobrancaBoleto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CobrancaBoletoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CobrancaBoleto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cobranca_id' => Cobranca::factory(), 
            'numero' => $this->faker->numerify('#########'), 
            'numero_documento' => $this->faker->numerify('#########')
        ];
    }
}