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
					<form action="{{route('requisicao.salvar')}}" method="POST" id="contact_form">
					{{ csrf_field() }}

						<input type="hidden" name="_method" value="put">
						<div class="form-row">
							<div class="form-group col-md-6">
						  		<label for="requerente" class="col-md-6 col-md-offset-5">Requerente</label>
						  		<input type="text" class="form-control" id="requerente" name="requerente" placeholder="Digite o nome do solicitante" required="Gentileza preencher o requerente.">
							</div>
							<div class="form-group col-md-6">
						  		<label for="cpf" class="col-md-6 col-md-offset-5">CPF</label>
						  		<input type="text" class="form-control" id="cpf" name="cpf" placeholder="nº do CPF do requerente" maxlength="11">
							</div>
						</div>
						<div class="form-group">
							<label for="descricao" class="col-md-6 col-md-offset-5">Requisição</label>
							<textarea class="form-control" id="descricao" name="descricao" cols="40" rows="6" required></textarea>
						</div>
						<div class="form-group">
							<label for="justificativa" class="col-form-label col-md-6 col-md-offset-5">Justificativa</label>
							<textarea class="form-control" id="justificativa" name="justificativa" cols="40" rows="6" required></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						  		<label for="setor" class="col-md-6 col-md-offset-5">Setor</label>
						  		<input type="text" class="form-control" id="setor" name="setor" placeholder="Setor de origem" required>
							</div>
							<div class="form-group col-md-6">
								<input type="hidden" id="status" name="status" value="Em andamento">
								<input type="hidden" id="usuario" name="usuario" value="{{Auth::user()->name}}">
								<input type="hidden" value="{{ Auth::user()->name }}">
						  		<label for="usuario" class="col-md-6 col-md-offset-5">Usuário</label>
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
