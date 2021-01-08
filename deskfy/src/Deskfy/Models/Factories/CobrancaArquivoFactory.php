<?php

namespace Deskfy\Models\Factories;

use Deskfy\Models\Entidade;
use Deskfy\Models\Cobranca;
use Deskfy\Models\CobrancaArquivo;
use Deskfy\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CobrancaArquivoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CobrancaArquivo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakerFile = $this->faker->file('/tmp', storage_path('app'));
        $caminho = Str::beforeLast($fakerFile, '/');
        $arquivo = Str::afterLast($fakerFile, '/');
        
        return [
            'cobranca_id' => Cobranca::factory(), 
            'arquivo' => $arquivo, 
            'caminho' => $caminho, 
            'observacao' => $this->faker->optional()->realText, 
        ];
    }
}