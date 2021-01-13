<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Empresa;
use Deskfy\Models\EmpresaBanco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaBancoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmpresaBanco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => Empresa::factory(), 
            'banco' => $this->faker->randomElement(['Itaú', 'Bradesco', 'Santander']), 
            'agencia' => $this->faker->numerify('####'), 
            'conta' => $this->faker->numerify('######'), 
            'carteira' => $this->faker->randomElement([110]), 
        ];
    }
}