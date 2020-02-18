<?php

use Illuminate\Database\Seeder;
use ConfrariaWeb\crm\Models\Step;

class StepsTableSeeder extends Seeder
{
    public function run()
    {
        $steps = [
            ['name' => 'Prospecção', 'slug' => 'prospeccao'],
            ['name' => 'Qualificação', 'slug' => 'qualificacao'],
            ['name' => 'Apresentação', 'slug' => 'apresentacao'],
            ['name' => 'Maturação', 'slug' => 'maturacao'],
            ['name' => 'Negociação', 'slug' => 'negociacao'],
            ['name' => 'Fechamento', 'slug' => 'fechamento'],
            ['name' => 'Contrato', 'slug' => 'contrato'],
            ['name' => 'Pesquisa', 'slug' => 'pesquisa']
        ];

        foreach ($steps as $obj) {
            Step::create($obj);
            $this->command->info('Etapa  ' . $obj['name'] . ' criada.');
        }

    }
}
