@extends('layout/principal')

@section('conteudo')
<?php

	$cardapio=$dados['cardapio'];
	
	

	?>
<h2> Novo Pedido </h2>

<table class="table table-striped table-bordered table-hover">
	<tr>	
		<th>Descrição: </th>
		<th>Valor</th>
		<th>Tipo de Produto</th>
		<th>Status</th>
		<th>Montar</th>
		<th>Excluir</th>
	</tr>

	<?php  foreach($cardapio as $t): ?>
	<tr class="{{ $t->cardapio_ativo<=0 ? 'danger' : '' }}">
		
		<td><?= $t->cardapio_descr ?></td>	
		<td><?= $t->cardapio_valor ?></td>
		<td><?= $t->tipo_cardapio_descr ?></td>
		<td><?= $t->pedido_status ?></td>
		<td><a href="/pedido/update/<?=$t->cardapio_id ?>&<?=$t->pedido_id ?>" >Editar</a></td>
		<td><a href="/cardapio/monta/<?=$t->cardapio_id ?>" >Excluir</a></td>

	</tr>
	<?php  endforeach?>
</table>





@stop
