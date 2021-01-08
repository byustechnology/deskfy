<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Deskfy\Models\Cobranca;
use Deskfy\Models\Empresa;
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
            'empresa_id' => Empresa::factory(), 
            'entidade_id' => Entidade::factory(), 
            'titulo' => $this->faker->sentence(3), 
            'descricao' => $this->faker->realText, 
            'valor' => $this->faker->numberBetween(1000, 100000), 
            'vence_em' => $this->faker->dateTimeBetween('+1 day', '+60 days'), 
            'pago_em' => $this->faker->optional()->dateTimeBetween('-20 days', '-1 days'), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }

    public function aberta()
    {
        return $this->state(function (array $attributes) {
            return [
                'pago_em' => null,
                'vence_em' => $this->faker->dateTimeBetween('+1 day', '+30 days')
            ];
        });
    }

    public function paga()
    {
        return $this->state(function (array $attributes) {
            return [
                'pago_em' => $this->faker->dateTimeBetween('-30 days', '-1 day'),
                'vence_em' => $this->faker->dateTimeBetween('-2 day', '-1 days')
            ];
        });
    }

    public function vencida()
    {
        return $this->state(function (array $attributes) {
            return [
                'pago_em' => null,
                'vence_em' => $this->faker->dateTimeBetween('-30 day', '-1 days')
            ];
        });
    }
}