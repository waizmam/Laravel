<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            ['nome' => 'Camiseta Polo', 'preco' => 100, 'estoque' => 4, 'categoria_id' => 1],
            ['nome' => 'Calça Jeans', 'preco' => 120, 'estoque' => 1, 'categoria_id' => 1],
            ['nome' => 'Camisa Manga Longa', 'preco' => 34, 'estoque' => 2, 'categoria_id' => 1],
            ['nome' => 'Pc Games', 'preco' => 56, 'estoque' => 4, 'categoria_id' => 2],
            ['nome' => 'Impressora', 'preco' => 37, 'estoque' => 5, 'categoria_id' => 6],
            ['nome' => 'Mouse', 'preco' => 37, 'estoque' => 6, 'categoria_id' => 6],
            ['nome' => 'Perfume', 'preco' => 55, 'estoque' => 7, 'categoria_id' => 3],
            ['nome' => 'Cama de Casal', 'preco' => 11, 'estoque' => 8, 'categoria_id' => 4],
            ['nome' => 'Móveis', 'preco' => 11, 'estoque' => 8, 'categoria_id' => 4]
        ]);
    }
}
