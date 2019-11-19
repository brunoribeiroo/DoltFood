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
	<label>Valor R$</label>
	<input  id='cardapio_valor'  class="form-control" name='cardapio_valor' input type="number" value="0	" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="currency">
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
