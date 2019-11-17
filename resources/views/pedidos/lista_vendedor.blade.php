@extends('layout/principal')

@section('conteudo')
<?php


	foreach ($pedido_ingrediente as $p) {
		
		$pedido=$p->pedido_id;
	}


	?>

	

<center><button type="button" id="sidebarCollapse" class="btn btn-danger" onclick="window.location.href='/pedido/finalizar_vendedor/<?php echo $pedido;?>' ">
                        <span>Finalizar Pedido</span>
                    </button>   </center>
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
		
		<td><a href="/cardapio/monta/<?=$t->cardapio_id ?>" >Excluir</a></td>

	</tr>
	<?php  endforeach?>
</table>





@stop
