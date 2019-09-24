@extends('layout/principal')

@section('conteudo')

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Tipo Cardapio</th>
		
	</tr>

	<?php foreach($tipo_cardapio as $t): ?>
	<tr class="{{ $t->tipo_cardapio_ativo<=0 ? 'danger' : '' }}">
		<td><?= $t->tipo_cardapio_id ?></td> 
		<td><?= $t->tipo_cardapio_descr ?></td>	
		

	</tr>
	<?php  endforeach?>
</table>
@stop
