<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atualizacao extends Model
{

	protect $table = "atualizacoes";
	
    public function requisicao()
    {
    	return $this->belongsTo('App\Requisicao');
    }
}
