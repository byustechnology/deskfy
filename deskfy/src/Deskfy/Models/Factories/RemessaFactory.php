<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Remessa;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemessaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Remessa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->numerify('########'), 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}