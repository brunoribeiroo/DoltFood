@extends('layout/principal')

@section('conteudo')

<form action="/tipo_ingrediente/adiciona/" method="post">
	<div class="form-group">
		<input type="hidden" value="{{csrf_token()}}" name="_token" >
	<label>Nome do Tipo do Ingrediente</label>
	<input class="form-control" type="" id="nome_tipo_ingrediente" name="nome_tipo_ingrediente">
	</div>

<button type="submit"> Enviar</button>
</form>
@stop

