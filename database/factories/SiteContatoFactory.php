<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' =>$faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'motivo_contato'=> $faker->numberBetween(1,3),
        'mensagem' => $faker->text(200)
    ];
});


//cria-se uma factory: php artisan make:factory "nomeDaFactory" --model="nomeDaModel"