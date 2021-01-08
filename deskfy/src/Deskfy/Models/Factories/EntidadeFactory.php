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
            'tipo' => $this->faker->randomElement(array_keys(Entidade::TIPOS)), 
            'codigo' => $this->faker->unique()->bothify('#####-??'), 
            'titulo' => $this->faker->sentence(3), 
            'documento' => $this->faker->unique()->numerify('##############'), 
            'responsavel' => $this->faker->name, 
            'cep' => $this->faker->numerify('########'), 
            'endereco' => $this->faker->randomElement(['Rua', 'Alameda', 'Avenida']) . ' ' . $this->faker->randomElement(['das Flores', 'Estádio', 'Centro']), 
            'numero' => $this->faker->numerify('####'), 
            'bairro' => $this->faker->randomElement(['Centro', 'Jardim das flores', 'Jardins', 'Moema', 'Bandeirantes']), 
            'cidade' => $this->faker->city, 
            'estado' => $this->faker->stateAbbr, 
            'complemento' => $this->faker->optional()->sentence, 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}