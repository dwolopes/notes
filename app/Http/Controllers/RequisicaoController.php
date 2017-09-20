<?php

namespace App\Http\Controllers;

use App\Requisicao;
use App\Atualizacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class RequisicaoController extends Controller
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
    public function index(Request $request)
    {
        if ($request->has('tipo_req')){

            $status_filtro = $request->input('tipo_req');

            if($status_filtro == ""){
                $requisicoes = Requisicao::paginate(10);
            }
            else{

                $requisicoes = DB::table('requisicaos')
                ->where('status','=', $status_filtro)
                ->orderBy('updated_at', 'desc')
                ->paginate(10)
                ->appends('tipo_req', request('tipo_req'));
            }
        }
        else{

            $requisicoes = Requisicao::paginate(10);
        }

        return view('home', compact('requisicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('requisicao.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Requisicao::create($request->all())){

            \Session::flash('flash_message',[
                'msg'=>"A requisição foi incluída com sucesso!",
                'class'=>"alert-sucess"
            ]);
        }else{

            \Session::flash('flash_message',[
                'msg'=>"A requisição não pode ser incluída!",
                'class'=>"alert-danger"
            ]);
        }

        return redirect()->route('requisicao.adicionar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisicao = Requisicao::find($id);

        $atualizacoes_recentes = DB::table('atualizacaos')
                ->where('requisicao_id','=', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        // $atualizacoes_recentes = Atualizacao::where('requisicao_id','=', $id)
        //             ->orderBy('created_at', 'desc')
        //             ->paginate(2);

        return view('requisicao.detalhar', compact('requisicao','atualizacoes_recentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {

        $requisicao = Requisicao::find($id);

        $atualizacao_recente = DB::table('atualizacaos')
                ->where('requisicao_id','=', $id)
                ->orderBy('created_at', 'desc')
                ->first();


                Response::json($atualizacao_recente);

                if ($atualizacao_recente != null) {
                    $atualizacao_recente->success = true;
                    return Response::json($atualizacao_recente);
                }else{
                    return Response::json([
                          "success" => false,
                          "error_message" => "Ainda não existe atualização para essa requisição."
                    ]);
                }
    }



    public function edit(Requisicao $requisicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisicao $requisicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisicao $requisicao)
    {
        //
    }

    /**
     * Filtering results
     *
     * @param  \App\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
}
