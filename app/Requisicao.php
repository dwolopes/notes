<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    protected $fillable = ['requerente', 'cpf', 'descricao', 'setor', 'justificativa', 'status', 'usuario'];

    public function atualizacoes()
    {
    	return $this->hasMany('App\Atualizacao');
    }

    public function AddAtualizacoes(Atualizacao $atual)
    {
    	return $this->atualizacoes()->save($atual);
    }
}
