<?php

namespace App\Http\Controllers;

use App\Atualizacao;
use App\Requisicao;
use Illuminate\Http\Request;

class AtualizacaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request, $id)
    {
        $atualizacao = new Atualizacao;
        $atualizacao->titulo_atualizacao = $request->input('titulo_atualizacao');
        $atualizacao->atualizacao = $request->input('atualizacao');
        $atualizacao->usuario = $request->input('usuario');

        $requisicao = Requisicao::find($id);
        if($requisicao->AddAtualizacoes($atualizacao)){
            \Session::flash('flash_message',[
            'msg'=>"A atualização foi incluída com sucesso!",
            'class'=>"alert-sucess"
            ]);
        }else{
            \Session::flash('flash_message',[
            'msg'=>"A atualização não pode ser incluída!",
            'class'=>"alert-danger"
            ]);
        }

        return redirect()->route('requisicao.detalhar',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atualizacao  $atualizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Atualizacao $atualizacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atualizacao  $atualizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Atualizacao $atualizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atualizacao  $atualizacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atualizacao $atualizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atualizacao  $atualizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atualizacao $atualizacao)
    {
        //
    }
}
