<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Remessa;
use Deskfy\Models\RemessaBoleto;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemessaBoletoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RemessaBoleto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'remessa_id' => Remessa::factory(), 
        ];
    }
}