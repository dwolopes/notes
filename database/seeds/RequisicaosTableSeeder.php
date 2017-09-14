<?php

use Illuminate\Database\Seeder;

class RequisicaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Requisicao::class, 25)->create()->each(function ($u) {
        	$u->atualizacoes()->save(factory(App\Atualizacao::class)->make());
    	});
    }
}
