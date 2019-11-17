@extends('layout/principal')

@section('conteudo')

<h2> Listagem de Cardapios </h2> 
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Usuário que criou </th>
		<th>Cardapio</th>
		<th>Valor</th>
		<th>Tipo</th>
		<th>Ação</th>
	</tr>

	<?php foreach($cardapio as $t): ?>
	<tr class="{{ $t->cardapio_ativo<=0 ? 'danger' : '' }}">
		<td><?= $t->login_user ?></td> 
		<td><?= $t->cardapio_descr ?></td>	
		<td><?= $t->cardapio_valor ?></td>
		<td><?= $t->tipo_cardapio_descr ?></td>
		<td><a href="/cardapio/monta/<?=$t->cardapio_id ?>" >Montar Cardápio</a></td>

	</tr>
	<?php  endforeach?>
</table>





@stop
