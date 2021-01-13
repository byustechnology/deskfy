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
            'titulo' => $this->faker->randomElement(['Itaú']), // TODO: Implementar outros bancos após os testes iniciais.
            'agencia' => $this->faker->numerify('####'), 
            'conta' => $this->faker->numerify('######'), 
            'carteira' => 109, // TODO: Deixar dinâmico dependendo do banco (usar constantes das classes)
        ];
    }
}