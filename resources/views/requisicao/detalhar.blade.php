@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<ol class="breadcrumb panel-heading">
                    <li><a style="text-decoration:none" href="{{route('home')}}">Home</a></li>
                    <li class="active">Detalhar Requisições</li>
                </ol>
                <div class="panel-heading">
                	<div class="row">
                		<div class="col-md-3">
                			<b>Número da Requisição:</b> {{$requisicao->id}}
                		</div>
                		<div class="col-md-3">
                			<b>CPF do Requerente:</b> {{$requisicao->cpf}}
                		</div>
                		<div class="col-md-6">
                			<b>Nome do Requerente:</b> {{$requisicao->requerente}}
                		</div>
                	</div>
                 </div>
				<div class="panel-body">
                    <h4 class="card-title">Setor: {{$requisicao->setor}}</h4>
                    <p class="card-text">{{$requisicao->descricao}}</p>
                    <p class="card-text">{{$requisicao->justidicativa}}</p>
                    <p class="card-text">{{$requisicao->usuario}}</p>
                    <div class="alert alert-success" role="alert">
                        {{$requisicao->status}}
                    </div>
                    <!--<a href="#" class="btn btn-primary">Adicionar Atualização</a>-->
                    @if($requisicao->status == "Em andamento")
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddAtualizacao">Adicionar Atualização
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalConclusao">Concluir Requisição
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalCancelamento">Cancelar Requisição
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" disabled="disabled" data-toggle="modal" data-target="#modalAddAtualizacao">Adicionar Atualização
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success" disabled="disabled" data-toggle="modal" data-target="#modalCancelamento">Concluir Requisição
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger" disabled="disabled" data-toggle="modal" data-target="#modalConclusao">Cancelar Requisição
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalAddAtualizacao" id="modalAddAtualizacao">
  						<div class="modal-dialog modal-lg" role="document">
    						<div class="modal-content">
    							<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="gridSystemModalLabel">Atualizando Requisição</h4>
      							</div>
      							<div class="modal-body">
	  								<div class="row">
	  									<div class="col-md-12">
	  										<div class="panel panel-default">
	  											<div class="panel-heading">
	  												<center><h4>Atualizando requisição de número: {{$requisicao->id}}</h4></center>
                                                    <p>Essa opção deve ser utilizada para adicionar atualizaçãos da requisição durante seu andamento.</p>
	  											</div>
	  											<div class="panel-body">
	  												<form action="{{route('atualizacao.adicionar',$requisicao->id )}}" method="POST">
	  													{{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="put">
	  													<div class="form-row">
															<div class="form-group col-md-6">
							  									<center><label for="requerente">Titulo da Atualização</label></center>
							  									<input type="text" class="form-control" id="titulo_atualizacao" name="titulo_atualizacao" placeholder="Dê um titulo a essa atualização" required>
							  									<div class="invalid-feedback">
	        														Por favor, informe um título.
	      														</div>
															</div>
															<div class="form-group col-md-6">
							  									<center><label for="user">Usuário</label></center>
                                                                <input type="hidden" id="usuario" name="usuario" value="{{Auth::user()->name}}">
							  									<input type="text" class="form-control" id="usuario" name="usuario" value="{{Auth::user()->name}}" disabled>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-12">
							  									<center><label for="requerente">Atualização</label></center>
							  									<textarea class="form-control" id="atualizacao" name="atualizacao" cols="40" rows="6" required></textarea>
							  									<div class="invalid-feedback">
	        														Por favor, informe a atualização ocorrida.
	      														</div>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-3">
        														<button type="submit" class="btn btn-primary">Salvar alterações</button>
        													</div>
        												</div>
	  												</form>
	  											</div>
	  										</div>
	  									</div>
  									</div>
  								</div>
  								<div class="modal-footer">
        							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      							</div>
    						</div>
  						</div>
					</div>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalCancelamento" id="modalCancelamento">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="gridSystemModalLabel">Motivo do cancelamento</h4>
                                    <p>Essa opção deve ser utilizada quando por alguma razão a requisição precisou ser interrompida. Por exemplo: uma requisição aberta de forma errada ou uma requisição que não deveria ter sido aberta neste sistema.</p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <center><h4>Atualizando requisição de número: {{$requisicao->id}}</h4></center>
                                                </div>
                                                <div class="panel-body">
                                                    <form action="{{route('atualizacao.cancelamento',$requisicao->id )}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="put">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <center><label for="requerente">Titulo da Atualização</label></center>
                                                                <input type="text" class="form-control" id="titulo_atualizacao" name="titulo_atualizacao" value="Cancelado" disabled>
                                                                <input type="hidden" id="titulo_atualizacao" name="titulo_atualizacao" value="Cancelado">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <center><label for="user">Usuário</label></center>
                                                                <input type="hidden" id="usuario" name="usuario" value="{{Auth::user()->name}}">
                                                                <input type="text" class="form-control" id="usuario" name="usuario" value="{{Auth::user()->name}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <center><label for="requerente">Motivo Cancelamento</label></center>
                                                                <textarea class="form-control" id="atualizacao" name="atualizacao" cols="40" rows="6" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalConclusao" id="modalConclusao">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="gridSystemModalLabel">Detalhamento do fechamento da requisição</h4>
                                    <p>Essa opção deve ser utilizada quando a requisição é fechada obdecendo todos os ciclos; independente se foi atendida ou não. Portanto, se a requisição foi concluída com sucesso, desde sua abertura até seu fechamento sem qualquer interrupção. </p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <center><h4>Atualizando requisição de número: {{$requisicao->id}}</h4></center>
                                                </div>
                                                <div class="panel-body">
                                                    <form action="{{route('atualizacao.conclusao',$requisicao->id )}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="put">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <center><label for="requerente">Titulo da Atualização</label></center>
                                                                <input type="text" class="form-control" id="titulo_atualizacao" name="titulo_atualizacao" value="Fechado" disabled>
                                                                <input type="hidden" id="titulo_atualizacao" name="titulo_atualizacao" value="Fechado">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <center><label for="user">Usuário</label></center>
                                                                <input type="hidden" id="usuario" name="usuario" value="{{Auth::user()->name}}">
                                                                <input type="text" class="form-control" id="usuario" name="usuario" value="{{Auth::user()->name}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <center><label for="requerente">Detalhes do fechamento</label></center>
                                                                <textarea class="form-control" id="atualizacao" name="atualizacao" cols="40" rows="6" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	@foreach($atualizacoes_recentes as $atualizacao)
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                		<div class="col-md-3">
                			<b>Número da Atualização:</b> {{$atualizacao->id}}
                		</div>
                		<div class="col-md-3">
                			<b>Número da requisição:</b> {{$atualizacao->requisicao_id}}
                		</div>
                		<div class="col-md-6">
                			<b>Usuário que adicinou:</b> {{$atualizacao->usuario}}
                		</div>
                	</div>
                 </div>
				<div class="panel-body">
                    <h4 class="card-title">Atualização: <b>{{$atualizacao->titulo_atualizacao}}</b></h4>
                    <p class="card-text">{{$atualizacao->atualizacao}}</p>
                </div>
                <div class="panel-footer">
                    <p><b>Data da adição:</b> {{ Carbon\Carbon::parse($atualizacao->created_at)->format('d-m-Y H:i:s') }}</p>
                </div>
			</div>
		</div>
	</div>
	@endforeach
    <div align="center">
        {!! $atualizacoes_recentes->links() !!}
    </div>
</div>

@endsection