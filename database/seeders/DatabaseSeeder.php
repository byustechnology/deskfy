<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create(['email' => 'admin@admin.com']);
        \Deskfy\Models\Cobranca::factory()->aberta()->recorrente()->mensalmente()->create();
        \Deskfy\Models\Cobranca::factory()->aberta()->create();
        \Deskfy\Models\EntidadeEmail::factory()->count(2)->create(['entidade_id' => 1]);
        \Deskfy\Models\EntidadeTelefone::factory()->count(2)->create(['entidade_id' => 1]);
        \Deskfy\Models\EmpresaBanco::factory()->count(1)->create(['empresa_id' => 1]);
        \Deskfy\Models\CobrancaBoleto::factory()->count(1)->create(['cobranca_id' => 1]);
    }
}
