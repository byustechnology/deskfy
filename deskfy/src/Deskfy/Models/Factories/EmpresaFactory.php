<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Empresa;
use Deskfy\Models\Estado;
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
            'documento' => $this->faker->unique()->numerify('##############'), 
            'cep' => $this->faker->numerify('########'), 
            'endereco' => $this->faker->randomElement(['Rua', 'Alameda', 'Avenida']) . ' ' . $this->faker->randomElement(['das Flores', 'Estádio', 'Centro']), 
            'numero' => $this->faker->numerify('####'), 
            'bairro' => $this->faker->randomElement(['Centro', 'Jardim das flores', 'Jardins', 'Moema', 'Bandeirantes']), 
            'cidade' => $this->faker->city, 
            'estado' => $this->faker->randomElement(array_keys(Estado::BRASIL)), 
            'complemento' => $this->faker->optional()->sentence, 
            'email' => $this->faker->safeEmail, 
            'telefone' => $this->faker->numerify('############'), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}