@extends('layout/principal')

@section('conteudo')
<?php
	
/*	echo "<pre>";
	print_r($pedido_ingrediente);
	echo "</pre>";

	exit();*/

	foreach ($pedido_ingrediente as $p) {
		
		$pedido=$p->pedido_id;
	}


	?>

	
<a href="/pedido/novo/<?php echo $pedido; ?>" >Novo pedido</a>

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>Cardápio </th>
		<th>Ingrediente </th>
		<th>Tipo de Cardapio </th>
		<th>Tipo de Ingrediente </th>	
		<th>Status</th>	
		<th>Excluir</th>
	</tr>

	<?php  foreach($pedido_ingrediente as $t): ?>
	<tr >
	
		<td><?= $t->cardapio_descr ?></td>
		<td><?= $t->ingrediente_descr ?></td>	
		<td><?= $t->tipo_cardapio_descr ?></td>
		<td><?= $t->tipo_ingr_descr ?></td>
	
		<td><?= $t->pedido_status ?></td>
		<td><a href="/pedido/update/<?=$t->cardapio_id ?>&<?=$pedido ?>" >Editar</a></td>
		<td><a href="/cardapio/monta/<?=$t->cardapio_id ?>" >Excluir</a></td>

	</tr>
	<?php  endforeach?>
</table>





@stop
