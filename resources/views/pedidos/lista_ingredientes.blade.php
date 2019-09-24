@extends('layout/principal')

@section('conteudo')


<?php 
$cardapio_descr_nome="";


$pedido_cardapio=$retorno['pedido_cardapio'];
$pedido_id=$retorno['pedido_id'];



foreach($pedido_cardapio as $t){

    $cardapio_descr_nome=$t->cardapio_descr;
}
    echo $cardapio_descr_nome;
?>
<table class="table">
<?php foreach($pedido_cardapio as $p):?>
<tr><td>
<td><?= $p->ingrediente_descr ?></td> 
<td><?= $p->ingrediente_valor ?></td>
<td><a href='/pedido/excluir/<?= $p->ingrediente_id ?>&<?php echo  $pedido_id; ?>&<?php echo  $p->cardapio_id; ?>' > Excluir </a></td>  

</td></tr>
<?php endforeach ?>
<a href='/pedido/salvar/<?php echo $pedido_id;?>'>Salvar </a>



</table>




@stop