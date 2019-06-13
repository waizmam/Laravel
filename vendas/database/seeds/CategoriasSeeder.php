<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            ['nome' => 'Roupas'],
            ['nome' => 'Eletrônicos'],
            ['nome' => 'Perfumes'],
            ['nome' => 'Móveis'],
            ['nome' => 'Alimentos'],
            ['nome' => 'Informática'],
        ]);
    }
}
