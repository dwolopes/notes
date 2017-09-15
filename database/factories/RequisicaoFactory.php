<?php

use Faker\Generator as Faker;

$factory->define(App\Requisicao::class, function (Faker $faker) {
    return [
        'requerente' => $faker->name,
        'cpf' => $faker->ean8,
        'descricao' => $faker->paragraph($nbSentences = 1),
        'setor' => $faker->company,
        'justificativa' => $faker->paragraph($nbSentences = 3),
        'status' => 'Cancelado',
        'usuario' => $faker->safeEmail,
    ];
});
