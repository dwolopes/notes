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
                                    <div class="alert alert-success" role="alert">
                                        {{$requisicao->status}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{route('requisicao.detalhar', $requisicao->id)}}" class="btn btn-primary">Detalhes da Requisição</a>
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
