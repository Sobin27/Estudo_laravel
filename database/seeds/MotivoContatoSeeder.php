<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Utilizando o metodo create fornecido pelo model (Necessario definir o metodo fillable na classe para utilizar esse metodo)
        MotivoContato::create(['motivo_contato' => 'Duvida']);
        MotivoContato::create(['motivo_contato' => 'Elogio']);
        MotivoContato::create(['motivo_contato' => 'Reclamação']);
    }
}
