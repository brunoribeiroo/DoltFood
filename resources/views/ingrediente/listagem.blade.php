@extends('layout/principal')

@section('conteudo')

<h2> Listagem de Ingredientes </h2>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Ingrediente</th>
		<th>Valor</th>
		<th>Tipo</th>
	</tr>

	<?php foreach($ingrediente as $t): ?>
	<tr class="{{ $t->ingrediente_ativo<=0 ? 'danger' : '' }}">
		<td><?= $t->ingrediente_id ?></td> 
		<td><?= $t->ingrediente_descr ?></td>	
		<td><?= $t->ingrediente_valor ?></td>
		<td><?= $t->tipo_ingr_descr ?></td>
		<td><a href="/ingrediente/excluir/<?=$t->ingrediente_id ?>">Excluir</a>
	</tr>
	<?php  endforeach?>
</table>
@stop
