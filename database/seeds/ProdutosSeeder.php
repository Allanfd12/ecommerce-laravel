<?php

use Illuminate\Database\Seeder;
use App\Produto;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome' => 'Produto 1',
            'slug' => 'produto-1',
            'descricao' => 'Loren ipso dolor sit amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'detalhes' => 'Detalhes do produto 1',
            'valor' => '10.00',
        ]);
        Produto::create([
            'nome' => 'Produto 2',
            'slug' => 'produto-2',
            'descricao' => 'Descrição do produto 2',
            'detalhes' => 'Detalhes do produto 2',
            'valor' => '20.00',
        ]);
        Produto::create([
            'nome' => 'Produto 3',
            'slug' => 'produto-3',
            'descricao' => 'Descrição do produto 3',
            'detalhes' => 'Detalhes do produto 3',
            'valor' => '30.00',
        ]);
        //
    }
}
