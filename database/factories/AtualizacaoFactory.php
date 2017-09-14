<?php

use Faker\Generator as Faker;

$factory->define(App\Atualizacao::class, function (Faker $faker) {
    return [
        'titulo_atualizacao' => $faker->word,
    	'atualizacao' => $faker->paragraph($nbSentences = 3),
    	'usuario' => $faker->safeEmail,
    ];
});
