<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            ['nome' => 'Elom Waizmam', 'cargo' => 'Analista Senior'],
            ['nome' => 'Janderson Dias', 'cargo' => 'Analista Junior'],
            ['nome' => 'Manoel Ruis', 'cargo' => 'Programador Junior']
        ]);
    }
}
