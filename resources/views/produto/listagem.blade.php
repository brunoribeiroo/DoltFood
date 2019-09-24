@extends('layout/principal')

@section('conteudo')

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Cardapio</th>
		<th>Status</th>
		<th>Cardapio_tipo</th>
		<th>Detalhes</th>
	</tr>

	<?php foreach($produtos as $p): ?>
	<tr class="{{ $p->cardapio_status<=0 ? 'danger' : '' }}">
		<td><?= $p->cardapio_id ?></td> 
		<td><?= $p->cardapio_text ?></td>
		<td><?= $p->cardapio_status ?></td>
		<td><?= $p->cardapio_tipo ?></td>
		<td>
			<a  onclick='window.open("/produtos/mostra/<?=$p->cardapio_id ?>","blank")'  >Visualizar</a>
		</td>
		<td>
			<a  onclick='window.open("/produtos/remove/<?=$p->cardapio_id ?>","blank")'  >Excluir</a>
		</td>
	</tr>
<?php  endforeach?>
</table>
@stop
