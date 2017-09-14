@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<ol class="breadcrumb panel-heading">
                    <li><a style="text-decoration:none" href="{{route('home')}}">Home</a></li>
                    <li class="active">Adicionar</li>
                </ol>
				<div class="panel-body">
					<form action="{{route('requisicao.salvar')}}" method="POST">
					{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-row">
							<div class="form-group col-md-6">
						  		<label for="requerente">Requerente</label>
						  		<input type="text" class="form-control" id="requerente" name="requerente" placeholder="Digite o nome do solicitante" required>
						  		<div class="invalid-feedback">
        							Por favor, informe que está solicitando o pedido.
      							</div>
							</div>
							<div class="form-group col-md-6">
						  		<label for="cpf">CPF</label>
						  		<input type="text" class="form-control" id="cpf" name="cpf" placeholder="nº do CPF do requerente" >
							</div>
						</div>
						<div class="form-group">
							<label for="descricao">Requisição</label>
							<textarea class="form-control" id="descricao" name="descricao" cols="40" rows="6" required></textarea>
							<div class="invalid-feedback">
        							Por favor, forneça os detalhes do pedido.
      						</div>
						</div>
						<div class="form-group">
							<label for="justificativa" class="col-form-label">Justificativa</label>
							<textarea class="form-control" id="justificativa" name="justificativa" cols="40" rows="6" required></textarea>
							<div class="invalid-feedback">
        							Por favor, informe a justificativa da pelo solicitante por esse pedido.
      						</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						  		<label for="setor">Setor</label>
						  		<input type="text" class="form-control" id="setor" name="setor" placeholder="Setor de origem" required>
							</div>
							<div class="form-group col-md-6">
								<input type="hidden" id="status" name="status" value="Em andamento">
								<input type="hidden" id="usuario" name="usuario" value="{{Auth::user()->name}}">
								<input type="hidden" value="{{ Auth::user()->name }}">
						  		<label for="usuario">Usuário</label>
						  		<input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Adicionar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection