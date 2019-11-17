@extends('layout/principal')

@section('conteudo')

<h2> Cadastro de Novo Cardapio</h2>
<form action="/tipo_cardapio/adiciona/" method="post">
	<div class="form-group">
		<input type="hidden" value="{{csrf_token()}}" name="_token" >
	<label>Nome do Tipo do Cardapio</label>
	<input class="form-control" type="" id="nome_tipo_cardapio" name="nome_tipo_cardapio">
	</div>

<button type="submit"> Enviar</button>
</form>
@stop

