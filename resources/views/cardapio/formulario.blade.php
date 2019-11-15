@extends('layout/principal')

@section('conteudo')

<h2> Novo Cardapio </h2>

<form action="/cardapio/adiciona/" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="hidden" value="{{csrf_token()}}" name="_token" >
	<label>Nome do Cardapio</label>
	<input class="form-control" type="" id="nome_cardapio" name="nome_cardapio">
	</div>
	<div class="form-group">
	<label>Tipo</label>
	<select class="form-control" type="" id="tipo_cardapio" name="tipo_cardapio">
		<option>Selecione o Tipo de Cardapio</option>
		<?php foreach($tipo_cardapio as $t): ?>
		<option value="<?= $t->tipo_cardapio_id ?>"> <?= $t->tipo_cardapio_descr ?></option>
		<?php  endforeach?>
	</select>
	 <input type="file" name="image">
	</div>
	

<button type="submit"> Enviar</button>
</form>
@stop
