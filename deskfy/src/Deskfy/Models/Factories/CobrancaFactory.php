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
            'titulo' => $this->faker->randomElement(['Hospedagem', 'Renovação de domínio', 'Desenvolvimento de sistema']) . ' - ' . $this->faker->domainName,  
            'descricao' => $this->faker->realText, 
            'valor' => $this->faker->numberBetween(1000, 100000), 
            'vence_em' => $this->faker->dateTimeBetween('+1 day', '+60 days'), 
            'paga_em' => $this->faker->optional()->dateTimeBetween('-20 days', '-1 days'), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }

    public function aberta()
    {
        return $this->state(function (array $attributes) {
            return [
                'paga_em' => null,
                'vence_em' => $this->faker->dateTimeBetween('+1 day', '+30 days')
            ];
        });
    }

    public function paga()
    {
        return $this->state(function (array $attributes) {
            return [
                'paga_em' => $this->faker->dateTimeBetween('-30 days', '-1 day'),
                'vence_em' => $this->faker->dateTimeBetween('-2 day', '-1 days')
            ];
        });
    }

    public function vencida()
    {
        return $this->state(function (array $attributes) {
            return [
                'paga_em' => null,
                'vence_em' => $this->faker->dateTimeBetween('-30 day', '-1 days')
            ];
        });
    }

    public function enviada()
    {
        return $this->state(function (array $attributes) {
            return [
                'enviado_em' => today(), 
            ];
        });
    }

    public function recorrente()
    {
        return $this->state(function (array $attributes) {
            return [
                'recorrente' => true, 
                'repetir_por' => $this->faker->randomDigit, 
                'repetir_por_condicao' => $this->faker->randomElement(array_keys(Cobranca::REPETIR_POR_CONDICOES)), 
                'repetir_a_cada' => $this->faker->randomDigit, 
                'repetir_a_cada_condicao' => $this->faker->randomElement(array_keys(Cobranca::REPETIR_A_CADA_CONDICOES))
            ];
        });
    }

    public function mensalmente()
    {
        return $this->state(function (array $attributes) {
            return [
                'repetir_por' => 1, 
                'repetir_por_condicao' => 'm', 
                'repetir_a_cada' => 1, 
                'repetir_a_cada_condicao' => 'm'
            ];
        });
    }

    public function trimestralmente()
    {
        return $this->state(function (array $attributes) {
            return [
                'repetir_por' => 1, 
                'repetir_por_condicao' => 'm', 
                'repetir_a_cada' => 3, 
                'repetir_a_cada_condicao' => 'm'
            ];
        });
    }

    public function anualmente()
    {
        return $this->state(function (array $attributes) {
            return [
                'recorrente' => true, 
                'repetir_por' => 1, 
                'repetir_por_condicao' => 'a', 
                'repetir_a_cada' => 1, 
                'repetir_a_cada_condicao' => 'a'
            ];
        });
    }
}