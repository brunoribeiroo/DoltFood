@extends('layout/principal')

@section('conteudo')

<form action="/cardapio/monta_cardapio" method="POST">
<span>Lista de Ingrediente :</span>
<select name="ingrediente_id">
	<?php foreach($ingrediente as $t): ?>		
	<option value="<?=$t->ingrediente_id?>"><?=$t->ingrediente_descr?></option>	
	<?php  endforeach?>
</select>
<input type="hidden"  name="cardapio_id" value="<?= $id ?>">
<input type="hidden" value="{{csrf_token()}}" name="_token" >
<button>Adicionar</button>

</form>
<table class="table table-striped table-bordered table-hover">
<tr><th>Produto</th>
<th>Ingrediente</th>
<th>Valor</th>
<th>Tipo de Ingrediente</th>
<th>Ação</th>
</tr>
<?php $soma_valor=0;?>	
<?php foreach($cardapio_montado as $c):?>

<tr>
<td><?=$c->cardapio_descr?></td><td><?=$c->ingrediente_descr?></td><td><?=$c->ingrediente_valor?></td><td><?=$c->tipo_ingr_descr ?></td>
<td><a href="/cardapio/excluir/<?=$c->cardapio_id ?>&<?=$c->ingrediente_id ?>">Excluir</a>
</tr>

<?php
$soma_valor=$soma_valor+$c->ingrediente_valor;
 ?>

<?php endforeach ?>
<tr><td>Soma:</td><td colspan="6" align="right"><?=$soma_valor ?></td></tr>
</table>
@stop
