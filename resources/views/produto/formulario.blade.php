@extends('layout/principal')

@section('conteudo')

<form action="/produtos/adiciona" method="post">
	<div class="form-group">
		<input type="hidden" value="{{csrf_token()}}" name="_token" >
	<label>Nome do Lanche</label>
	<input class="form-control" type="" id="cardapio_text" name="cardapio_text">
	<div>
	<div class="form-group">
	<label>Status</label>
	<input class="form-control" type="" id="status" name="status">
	<div>
	<div class="form-group">
	<label> Tipo</label>
	<input class="form-control" type="" id="tipo" name="tipo">
<div>

<button type="submit"> Submit</button>
</form>
@stop
