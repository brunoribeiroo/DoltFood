@extends('layout/principal')

@section('conteudo')

<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>Tipo Ingrediente</th>
		
	</tr>

	<?php foreach($tipo_ingrediente as $t): ?>
	<tr class="{{ $t->tipo_ingr_ativo<=0 ? 'danger' : '' }}">
		<td><?= $t->tipo_ingr_id ?></td> 
		<td><?= $t->tipo_ingr_descr ?></td>	
		

	</tr>
	<?php  endforeach?>
</table>
@stop
