<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(85)997357408';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato= 2;
        $contato->mensagem = 'Fiquei com duvida em uma parada ai sobre o SG';
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
    }
}
