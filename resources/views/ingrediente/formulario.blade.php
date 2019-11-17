@extends('layout/principal')

@section('conteudo')

<h2> Cadastro de Novo Ingrediente </h2>
<form action="/ingrediente/adiciona/" method="post">
	<div class="form-group">
		<input type="hidden" value="{{csrf_token()}}" name="_token" >
	<label>Nome do Ingrediente</label>
	<input class="form-control" type="" id="nome_ingrediente" name="nome_ingrediente">
	</div>
	<div class="form-group">
	<label>Valor</label>
	<input class="form-control" type="" id="valor_ingrediente" name="valor_ingrediente">
	</div>
	<div class="form-group">
	<label>Tipo</label>
	<select class="form-control" type="" id="tipo_ingrediente" name="tipo_ingrediente">
		<option>Selecione o Tipo de Ingrediente</option>
		<?php foreach($tipo_ingrediente as $t): ?>
		<option value="<?= $t->tipo_ingr_id ?>"> <?= $t->tipo_ingr_descr ?></option>
		<?php  endforeach?>
	</select>
	</div>
	

<button type="submit"> Enviar</button>
</form>
@stop
