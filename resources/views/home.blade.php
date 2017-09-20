@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a style="text-decoration:none" href="{{route('home')}}">Home</a></li>
                    <li class="active">Requisições em andamento</li>
                </ol>
                <form class="form-inline" method="GET" action="{{route('home')}}">
                        <div class="form-group">
                            <label for="tipo_req">Visualizar chamados</label>
                            <select class="form-control" id="tipo_req" name="tipo_req">
                                <option value=""></option>
                                <option value="Fechado">Fechados</option>
                                <option value="Em andamento">Em andamento</option>
                                <option value="Cancelado">Cancelados</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">
                            <img id="filtro" class="img-responsive" alt="filtro" src="{{ asset('images/filter.png')}}">
                    </button>
                 </form>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($requisicoes as $requisicao)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Requerente: {{$requisicao->requerente}}
                                </div>
                                <div class="panel-body">
                                    <h4 class="card-title">Setor: {{$requisicao->setor}}</h4>
                                    <p class="card-text">{{$requisicao->descricao}}</p>
                                    @if($requisicao->status == "Em andamento")
                                    <div class="alert alert-success" role="alert">
                                        {{$requisicao->status}}
                                    </div>
                                    @elseif($requisicao->status == "Fechado")
                                    <div class="alert alert-warning" role="alert">
                                        {{$requisicao->status}}
                                    </div>
                                    @else
                                    <div class="alert alert-danger" role="alert">
                                        {{$requisicao->status}}
                                    </div>
                                    @endif
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-info {{$requisicao->id}}" style="display: none">
                                                    <div class="panel-heading">Atualização</div>
                                                    <div class="panel-body">
                                                        <table class="table {{$requisicao->id}}">
                                                            <thead>
                                                                <th>Id atualização</th>
                                                                <th>Titulo atualização</th>
                                                                <th>Atualização</th>
                                                                <th>Usuário que adicionou</th>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{route('requisicao.detalhar', $requisicao->id)}}" class="btn btn-primary">Detalhes da Requisição</a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-info" value ="{{$requisicao->id}}">
                                                Visualizar última atualização
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                    @endforeach
                </div>
                <div align="center">
                    {!! $requisicoes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
