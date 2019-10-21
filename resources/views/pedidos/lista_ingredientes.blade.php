@extends('layout/principal')

@section('conteudo')

<br>
<?php 
$cardapio_descr_nome="";


$pedido_cardapio=$retorno['pedido_cardapio'];
$pedido_id=$retorno['pedido_id'];



foreach($pedido_cardapio as $t){

    $cardapio_descr_nome=$t->cardapio_descr;
}
  //  echo $cardapio_descr_nome;

$cardapio_descr="";
$cardapio_antigo="";

?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<table>
	<tbody>
		<tr>
			<td><button type="button" id="sidebarCollapse" class="btn btn-info" onclick="window.location.href='/'">                       
                        <span>Selecionar mais</span>
                    </button>   </td>
                    <td><button type="button" id="sidebarCollapse" class="btn btn-info" onclick="GerarQR(<?php echo $pedido_id;?>)">
                        <span>Gerar QR Code do Pedidos                      </span>
                    </button>   </td>
		</tr>
	</tbody>
</table>

<table class="table">
<?php foreach($pedido_cardapio as $p):?>
<?php
 $cardapio_descr=$p->cardapio_descr;

 if($cardapio_descr!=$cardapio_antigo){?>
 		<td colspan="4"><b><?= $p->cardapio_descr ?></b></td>

 <?php }else{?>


<?php }	?>
<tr>
<td><?= $p->ingrediente_descr ?></td> 
<td><?= $p->ingrediente_valor ?></td>
<td><a href='/pedido/excluir/<?= $p->ingrediente_id ?>&<?php echo  $pedido_id; ?>&<?php echo  $p->cardapio_id; ?>' > Excluir </a></td>  

</td></tr>

<?php $cardapio_antigo=$cardapio_descr; ?>
<?php endforeach ?>
<br>
<a href='/pedido/salvar/<?php echo $pedido_id;?>'>Confirmar </a>

<div id="conteudo">
	
</div>



</table>




@stop